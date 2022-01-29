<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePointdeventeRequest;
use App\Http\Requests\UpdatePointdeventeRequest;
use App\Models\Pointdevente;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PointdeventeController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/points_de_ventes",
    *     @OA\Response(response="200", description="Display a listing of the resource.")
    * )
    */
    public function index()
    {
        $points = session()->has('LoggedUser') === true ? Pointdevente::with('articles')->with('restaurant')->get() : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);

        $restaurants = Restaurant::all();

        if (request()->ajax()) {
            return response(['points' => $points, 'restaurants' => $restaurants]);
        }

        return view('templates.pages.pointsdevente.index', compact('points', 'restaurants'));
    }

    /**
    * @OA\Post(
    *     path="/api/points_de_ventes/create",
    *     @OA\Response(response="201", description="Store a newly created resource in storage.")
    * )
    */
    public function store(StorePointdeventeRequest $request)
    {

        if(session()->has('LoggedUser'))
        {
            $pointdevente = Pointdevente::create($request->all());

            if($pointdevente === null)
            {
                return  response(['error' => 'Echec de creation d\'un point de vente.']);
            }

            return response(['message' => 'Point de vente ajoute avec success.']);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

    /**
    * @OA\Get(
    *     path="/api/points_de_ventes/show/{id}",
    *     @OA\Response(response="200", description="Display the specified resource.")
    * )
    */
    public function show($id)
    {
        $pointdevente = Pointdevente::with('articles')->with('restaurant')->find($id);

        if($pointdevente === null)
        {
            return response('Aucun point de vente n\'a ete trouve .', 404);
        }

        return response($pointdevente, 200);
    }

    /**
    * @OA\Update(
    *     path="/api/points_de_ventes/update/{id}",
    *     @OA\Response(response="200", description="Update the specified resource in storage.")
    * )
    */
    public function update(UpdatePointdeventeRequest $request, $id)
    {

        if(session()->has('LoggedUser'))
        {
            $pointdevente = Pointdevente::find($id);

            if($pointdevente === null)
            {
                return response('Aucun point de vente n\'a ete trouve .', 404);
            }

            $pointdevente->update($request->all());

            return response($pointdevente, 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }

    }

    /**
    * @OA\Delete(
    *     path="/api/points_de_ventes/delete/{id}",
    *     @OA\Response(response="200", description="Remove the specified resource from storage.")
    * )
    */
    public function destroy($id)
    {
        if(session()->has('LoggedUser'))
        {
            $pointdevente = Pointdevente::find($id);

            if($pointdevente === null)
            {
                return response('Aucun point de vente n\'a ete trouve .', 404);
            }

            $pointdevente->delete($id);

            return response("Point de vente supprime avec succes .", 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

    /**
    * @OA\Get(
    *     path="/api/points_de_ventes/search/{name}",
    *     @OA\Response(response="200", description="Search the specified resource.")
    * )
    */
    public function search(string $name)
    {
        $pointdevente = Pointdevente::where('pointdevente', 'like', '%'. $name .'%')->get();

        if(sizeof($pointdevente) === 0){

            return response('Aucun point de vente n\'a ete trouve .', 400);
        }

        return response($pointdevente, 200);
    }
}
