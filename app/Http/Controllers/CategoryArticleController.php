<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieArticleRequest;
use App\Http\Requests\UpdateCategorieArticleRequest;
use App\Models\CategorieArticle;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
     /**
    * @OA\Get(
    *     path="/api/categories_restaurants",
    *     @OA\Response(response="200", description="Display a listing of the resource.")
    * )
    */
    public function index()
    {
        $categories = session()->has('LoggedUser') === true ? CategorieArticle::with('restaurant')->with('articles')->get() : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);;

        $restaurants = Restaurant::all();

        if(request()->ajax())
        {
            return compact('categories', 'restaurants');
        }

        return view('templates.pages.categories_articles.index', compact('categories','restaurants'));
    }

     /**
    * @OA\Post(
    *     path="/api/categories_restaurants/create",
    *     @OA\Response(response="201", description="Store a newly created resource in storage.")
    * )
    */
    public function store(StoreCategorieArticleRequest $request)
    {

        if(session()->has('LoggedUser'))
        {
            $categorie = CategorieArticle::create($request->all());

            if($categorie === null)
            {
                return response(['error' => 'Echec de creation de la categorie d\'article']);
            }

            return response(['message' => 'Categorie ajoutee avec succes.']);

        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }

        // TODO : create failed

    }

    /**
    * @OA\Get(
    *     path="/api/categories_restaurants/show/{id}",
    *     @OA\Response(response="201", description="Display the specified resource.")
    * )
    */
    public function show($id)
    {

        $categorie = CategorieArticle::find($id);

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
    public function update(UpdateCategorieArticleRequest $request, $id)
    {

        if(session()->has('LoggedUser'))
        {
            $categorie = CategorieArticle::find($id);

            if($categorie === null)
            {
                return response("Aucune categorie trouvee .", 404);

            }

            $categorie->update($request->all());

            return response('Categorie mise a jour avec succes', 200);
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

        if(session()->has('LoggedUser'))
        {
            $categorie = CategorieArticle::find($id);

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
        $categorie = CategorieArticle::where('categorie', 'like', '%'. $name .'%')->get();

        if (sizeof($categorie) === 0) {

            return response("Aucune categorie trouvee .", 404);
        }

        return response($categorie, 200);
    }
}
