<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $errorMessages = [
        'username.required' => 'Le nom d\'utilisateur est obligatoire',
        'mail.required' => 'L\'adresse mail est obligatoire',
        'mail.email' => 'L\'adresse mail n\'est pas valide',
        'mail.unique' => 'L\'adresse mail est déjà utilisée',
        'password.required' => 'Le mot de passe est obligatoire',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
        'password.confirmed' => 'Les mots de passe ne correspondent pas',
        'id_cities.required' => 'La ville est obligatoire',
        'id_cities.integer' => 'La ville n\'est pas valide',
    ];

    public function getUserDetails($id)
    {
        return response()->json(User::find($id));
    }

    public function getUserList()
    {
        return response()->json(User::all());
    }

    public function createUser(Request $request)
    {
        $rules = [
            'username' => 'required',
            'mail' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'id_cities' => 'required|integer'
        ];

        $this->validate($request, $rules, $this->errorMessages);

        $user = User::create([
            'username' => $request->username,
            'mail' => $request->mail,
            'password' => Hash::make($request->password),
            'id_cities' => $request->id_cities,
        ]);

        return response()->json($user, 201);
    }

    public function updateUser($id, Request $request)
    {
        $user = User::findOrFail($id);

        $rules = [
            'username' => 'required',
            'mail' => 'required|email|unique:' . $this->table . ',mail,' . $id,
            'id_cities' => 'required|integer'
        ];

        $this->validate($request, $rules, $this->errorMessages);

        $user->update([
            'username' => $request->username,
            'mail' => $request->mail,
            'id_cities' => $request->id_cities,
        ]);

        return response()->json($user, 200);
    }

    public function updateUserPassword($id, Request $request)
    {
        $user = User::findOrFail($id);

        $rules = [
            'password' => 'required|confirmed|min:8',
        ];

        $this->validate($request, $rules, $this->errorMessages);

        $user->update(['password' => Hash::make($request->password),]);

        return response()->json($user, 200);
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return response('Supprimé.', 200);
    }
}
