<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateurRequest;
use App\Models\User;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard()
    {
       return view('templates.pages.dashboard.admin.dashboard');
    }

     /**
    * @OA\Get(
    *     path="/api/users",
    *     @OA\Response(response="200", description="Display a listing of the resource.")
    * )
    */
    public function index()
    {
        $users =  session()->has('LoggedUser') === true  ? User::where('role','!=', 'admin')->get() : response("Cette action n'est pas attachee a ce compte.", 401);

        // var_dump(json_encode($users,JSON_PRETTY_PRINT));die();

        return view('templates.pages.utilisateurs.index', compact('users'));
    }

    /**
    * @OA\Post(
    *     path="/api/users/create",
    *     @OA\Response(response="201", description="Store a newly created resource in storage.")
    * )
    */
    public function store(StoreUtilisateurRequest $request)
    {
        if(auth()->user()->role === 'admin')
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'admin'
            ]);
    
            $token = $user->createToken('restaurant-token')->plainTextToken;
    
            $response = [
              'user' => $user,
                'token' => $token
            ];
    
            return response([$response], 201);
        }
        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }


     /**
    * @OA\Get(
    *     path="/api/users/show/{id}",
    *     @OA\Response(response="200", description="Display the specified resource.")
    * )
    */
    public function show($id)
    {
        if(auth()->user()->role === 'admin')
        {
            $user = User::find($id);

            if($user === null)
            {
                return response("Aucun utilisateur n'a ete trouve.", 404);
            }

            return response($user, 200);
        }
        else
        {
            return response("Cette action n'est pas attachee a ce compte", 401);
        }
    }
    
    /**
    * @OA\Get(
    *     path="/api/users/search/{email}",
    *     @OA\Response(response="200", description="Display the specified resource.")
    * )
    */
    public function search(string $email)
    {
        if(auth()->user()->role === 'admin')
        {
            $user = User::where('email', $email)->first();

            if($user === null)
            {
                return response("Aucun utilisateur n'a ete trouve.", 404);
            }

            return response($user, 200);
        }

        else
        {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

     /**
    * @OA\Put(
    *     path="/api/users/update/{id}",
    *     @OA\Response(response="200", description="Update the specified resource in storage.")
    * )
    */
    public function update(UpdateUtilisateurRequest $request, $id)
    {
        if(auth()->user()->role === 'admin' || auth()->user()->role === 'restaurant')
        {
            $user = User::find($id);

            if($user === null)
            {
                return response("Aucun utilisateur n'a ete trouve.", 404);
            }

            $user->update($request->all());

            return response($user, 200);
        }
        
        else
        {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
    * @OA\Delete(
    *     path="/api/users/destroy/{id}",
    *     @OA\Response(response="200", description="Remove the specified resource from storage.")
    * )
    */
    public function destroy($id)
    {
        if(auth()->user()->role === 'admin')
        {
            $user = User::find($id);

            if($user === null)
            {
                return response("Aucun utilisateur n'a ete trouve.", 404);
            }

            $user->delete($id);

            return response("Le compte a ete supprime avec succes.", 200);
        }

        else
        {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }
}
