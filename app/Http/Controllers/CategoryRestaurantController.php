<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRestaurantRequest;
use App\Http\Requests\UpdateCategorieRestaurantRequest;
use App\Models\CategorieRestaurant;
use Illuminate\Http\Request;

class CategoryRestaurantController extends Controller
{
     /**
    * @OA\Get(
    *     path="/api/categories_restaurants",
    *     @OA\Response(response="200", description="Display a listing of the resource.")
    * )
    */
    public function index()
    {
        $categories = session()->has('LoggedUser') === true ? CategorieRestaurant::with('restaurants')->get() : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);;

        return view('templates.pages.categories_restaurants.index', compact('categories'));
    }

     /**
    * @OA\Post(
    *     path="/api/categories_restaurants/create",
    *     @OA\Response(response="201", description="Store a newly created resource in storage.")
    * )
    */
    public function store(StoreCategorieRestaurantRequest $request)
    {

        if(auth()->user()->role === 'admin')
        {
            $categorie = CategorieRestaurant::create($request->all());

            return response($categorie, 201);
            
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
       
    }

    /**
    * @OA\Get(
    *     path="/api/categories_restaurants/show/{id}",
    *     @OA\Response(response="201", description="Display the specified resource.")
    * )
    */
    public function show($id)
    {
        
        $categorie = CategorieRestaurant::find($id);

        if ($categorie === null) {
            
            return response("Aucune categorie trouvee .", 404);
        }

        return response($categorie, 200);
    }

    /**
    * @OA\Put(
    *     path="/api/categories_restaurants/update/{id}",
    *     @OA\Response(response="201", description="Update the specified resource in storage.")
    * )
    */
    public function update(UpdateCategorieRestaurantRequest $request, $id)
    {

        if(auth()->user()->role === 'admin')
        {
            $categorie = CategorieRestaurant::find($id);
            
            if($categorie === null)
            {
                return response("Aucune categorie trouvee .", 404);
            
            }
            
            $categorie->update($request->all());
            
            return response($categorie, 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
        
    }

    /**
    * @OA\Delete(
    *     path="/api/categories_restaurants/delete/{id}",
    *     @OA\Response(response="201", description="Remove the specified resource from storage.")
    * )
    */
    public function destroy($id)
    {

        if(auth()->user()->role === 'admin')
        {
            $categorie = CategorieRestaurant::find($id);

            if ($categorie === null) {
    
               return response("Aucune categorie trouvee .", 404);
            }
    
            $categorie->delete($id);
    
            return response("Categorie supprimee avec succes.", 200); 
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
        
    }

    /**
    * @OA\Get(
    *     path="/api/categories_restaurants/search/{name}",
    *     @OA\Response(response="201", description="Search the specified resource.")
    * )
    */
    public function search($name)
    {
        $categorie = CategorieRestaurant::where('categorie', 'like', '%'. $name .'%')->get();

        if (sizeof($categorie) === 0) {
            
            return response("Aucune categorie trouvee .", 404);
        }

        return response($categorie, 200);
    }
}
