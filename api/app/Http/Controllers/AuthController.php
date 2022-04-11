<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    private $table = 'a9bk4_users';
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

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {

        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'mail' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
            $rules = [
                'username' => 'required',
                'mail' => 'required|email|unique:' . $this->table,
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
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }
}
