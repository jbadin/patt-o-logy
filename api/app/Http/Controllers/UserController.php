<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1


class UserController extends Controller
{
<<<<<<< HEAD
=======
    private $table = 'a9bk4_users';
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
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
<<<<<<< HEAD
        return response()->json(Users::find($id));
=======
        return response()->json(User::find($id));
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
    }

    public function getUsersList()
    {
<<<<<<< HEAD
        return response()->json(Users::all());
=======
        return response()->json(User::all());
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
    }

    public function createUser(Request $request)
    {
        $rules = [
            'username' => 'required',
            'mail' => 'required|email|unique:' . $this->table,
            'password' => 'required|min:8|confirmed',
            'id_cities' => 'required|integer'
        ];

        $this->validate($request, $rules, $this->errorMessages);

<<<<<<< HEAD
        $user = Users::create([
=======
        $user = User::create([
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
            'username' => $request->username,
            'mail' => $request->mail,
            'password' => Hash::make($request->password),
            'id_cities' => $request->id_cities,
        ]);

        return response()->json($user, 201);
    }

    public function updateUser($id, Request $request)
    {
<<<<<<< HEAD
        $user = Users::findOrFail($id);
=======
        $user = User::findOrFail($id);
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1

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
<<<<<<< HEAD
        $user = Users::findOrFail($id);
=======
        $user = User::findOrFail($id);
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1

        $rules = [
            'password' => 'required|confirmed|min:8',
        ];

        $this->validate($request, $rules, $this->errorMessages);

        $user->update(['password' => Hash::make($request->password),]);

        return response()->json($user, 200);
    }

    public function deleteUser($id)
    {
<<<<<<< HEAD
        Users::findOrFail($id)->delete();
=======
        User::findOrFail($id)->delete();
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
        return response('Supprimé.', 200);
    }
}
