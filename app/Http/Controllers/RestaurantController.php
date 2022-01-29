<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\CategorieRestaurant;
use App\Models\Commande;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RestaurantController extends Controller
{

    public function dashboard()
    {
        $commandes = session()->has('LoggedUser') === true ?

            Commande::with('articles')->get() :

            response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);


        // var_dump(json_encode($commandes));die();


        return view('templates.pages.dashboard.restaurant.dashboard', compact('commandes'));
    }


    /**
     * @OA\Get(
     *     path="/api/restaurants",
     *     @OA\Response(response="200", description="Display a listing of the resource.")
     * )
     */
    public function index()
    {
        $restaurants = session()->has('LoggedUser') === true ? Restaurant::with('user')->with('categorie_restaurant')->get() : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);

        $categories = CategorieRestaurant::all();

        // var_dump(json_encode($restaurants,JSON_PRETTY_PRINT));die();

        return view('templates.pages.restaurants.index', compact('restaurants', 'categories'));
    }

    /**
     * @OA\Post(
     *     path="/api/restaurants/create",
     *     @OA\Response(response="201", description="Display the specified resource.")
     * )
     */
    public function store(StoreRestaurantRequest $request)
    {

        // var_dump(json_encode($request->all(),JSON_PRETTY_PRINT));die();

        if (session()->has('LoggedUser')) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'restaurant'
            ]);

            $token = $user->createToken('restaurant-token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            $restaurant = Restaurant::create(
                [
                    'idcategorie_restaurant' => $request->idcategorie_restaurant,
                    'iduser_restaurant' => $user->id,
                    'nom_restaurant' => $request->nom_restaurant,
                    'adresse' => $request->adresse,
                    'contact' => $request->contact,
                    'date_creation'
                ]
            );


            if ($restaurant === null) {
                return redirect()->back()->with('error', 'Echec de la creation du restaurant.');
            }

            return redirect()->back()->with('message', 'Restaurant cree avec succes.');
        } else {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/restaurants/show/{id}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        if ($restaurant === null) {

            return response("Aucun restaurant n'a ete trouve", 404);
        }

        return response($restaurant, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/restaurants/update/{id}",
     *     @OA\Response(response="200", description="Update the specified resource in storage.")
     * )
     */
    public function update(UpdateRestaurantRequest $request, $id)
    {
        if (auth()->user()->role === 'admin') {
            $restaurant = Restaurant::find($id);

            if ($restaurant === null) {
                return response("Aucun restaurant n'a ete trouve", 404);
            }

            $restaurant->update($request->all());

            return response($restaurant, 200);
        } else {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/restaurants/delete/{id}",
     *     @OA\Response(response="200", description="Remove the specified resource from storage.")
     * )
     */
    public function destroy($id)
    {

        if (auth()->user()->role === 'admin') {
            $restaurant = Restaurant::find($id);

            if ($restaurant === null) {
                return response("Aucun restaurant n'a ete trouve", 404);
            }

            $restaurant->delete($id);

            return response("Restaurant supprime avec success.", 200);
        } else {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/restaurants/search/{name}",
     *     @OA\Response(response="200", description="Search the specified resource.")
     * )
     */
    public function search(string $name)
    {
        $restaurant = Restaurant::where('nom_restaurant', 'like', '%' . $name . '%')->get();

        if (sizeof($restaurant) === 0) {

            return response("Aucun restaurant n'a ete trouve", 404);
        }

        return response($restaurant, 200);
    }
}
