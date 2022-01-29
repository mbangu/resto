<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServeurRequest;
use App\Http\Requests\UpdateServeurRequest;
use App\Models\Restaurant;
use App\Models\Serveur;
use App\Models\User;


class ServeurController extends Controller
{

    /**
    * @OA\Get(
    *     path="/api/serveurs",
    *     @OA\Response(response="201", description="Display a listing of the resource.")
    * )
    */
    public function index()
    {

        $serveurs = session()->has('LoggedUser') === true  ? Serveur::with('user')->with('restaurant')->get() : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);

        $restaurants = Restaurant::all();

        if (request()->ajax()) {

            return compact('serveurs', 'restaurants');
        }

        return view('templates.pages.serveurs.index', compact('serveurs', 'restaurants'));
    }


    /**
    * @OA\Post(
    *     path="/api/serveurs/create",
    *     @OA\Response(response="201", description="Store a newly created resource in storage.")
    * )
    */
    public function store(StoreServeurRequest $request)
    {

        $defined_serveur = User::where('email', $request->email)->get();

        if(sizeof($defined_serveur) === 0)
        {
            if(session()->has('LoggedUser'))
            {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'serveur'
                ]);

                $token = $user->createToken('restaurant-token')->plainTextToken;

                $response = [
                  'user' => $user,
                    'token' => $token
                ];

                $serveur = Serveur::create([
                    'idrestaurant' => $request->idrestaurant,
                    'serveur' => $request->serveur,
                    'iduser_serveur' => $user->id
                ]);

                if($serveur === null)
                {
                    return redirect()->back()->with('error', 'Echec de la creation du restaurant.');
                }

                return response(['message' => 'Serveur enregistre avec succes.']);
            }

            else
            {
                return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
            }
        }

        return redirect()->back()->with('error','Un compte utilisateur est deja attache a cette adresse email.', 200);
    }

    /**
    * @OA\Get(
    *     path="/api/serveurs/show/{id}",
    *     @OA\Response(response="200", description="Display the specified resource.")
    * )
    */
    public function show($id)
    {
        $serveur = Serveur::find($id);

        if($serveur === null)
        {
            return response('Aucun serveur n\'a ete trouve avec cet identifiant : '. $id . ' ', 404);
        }

        return response($serveur, 200);
    }


     /**
    * @OA\Delete(
    *     path="/api/serveurs/update/{id}",
    *     @OA\Response(response="200", description="Update the specified resource in storage.")
    * )
    */
    public function update(UpdateServeurRequest $request, $id)
    {
        if(session()->has('LoggedUser'))
        {
            $serveur = Serveur::find($id);

            if($serveur === null)
            {
                return response('Aucun serveur n\'a ete trouve avec cet identifiant : '. $id . ' ', 404);
            }

            $serveur->update($request->all());

            return response($serveur, 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

     /**
    * @OA\Delete(
    *     path="/api/serveurs/delete/{id}",
    *     @OA\Response(response="200", description="Remove the specified resource from storage.")
    * )
    */
    public function destroy($id)
    {
        if(session()->has('LoggedUser'))
        {
            $serveur = Serveur::find($id);

            if($serveur === null)
            {
                return response('Aucun serveur n\'a ete trouve avec cet identifiant : '. $id . ' ', 404);
            }

            $serveur->delete($id);

            return response(['message' => 'supprime avec success.'], 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

     /**
    * @OA\Get(
    *     path="/api/serveurs/search/{name}",
    *     @OA\Response(response="200", description="Search the specified resource.")
    * )
    */
    public function search(string $name)
    {
        $serveur = Serveur::where('serveur', 'like', '%'. $name .'%')->get();

        if(sizeof($serveur) === 0){

            return response('Aucun serveur n\'a ete trouve avec ce nom : '. $name .'', 400);
        }

        return response($serveur, 200);
    }
}
