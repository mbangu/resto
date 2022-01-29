<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUtilisateurRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('login');
    }

     /**
    * @OA\Post(
    *     path="/api/login",
    *     @OA\Response(response="201", description="Logged in.")
    * )
    */
    public function login(LoginUtilisateurRequest $request)
    {
        $user = User::where('name', $request->name)->first();

        // var_dump($user->role);die();

        // Check password

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return redirect()->route('loginForm')->with('message', 'Mot de passe ou login incorrect !');

        }

        $token = $user->createToken("restaurant-token")->plainTextToken;

        if($user->role === 'admin')
        {
            session()->put(['LoggedUser' => $user]);

            return redirect()->route('admin/dashboard');
        }

        else if($user->role === 'restaurant')
        {
            session()->put(['LoggedUser' => $user]);
            
            return redirect()->route('restaurant/dashboard');
        }
    }

    /**
    * @OA\Post(
    *     path="/api/logout",
    *     @OA\Response(response="200", description="Logged out.")
    * )
    */
    public function logout()
    {
        if (session()->has('LoggedUser')){

            session()->pull('LoggedUser');

            return redirect()->route('loginForm')->with('message', 'Logged out !');
        }
    }

}
