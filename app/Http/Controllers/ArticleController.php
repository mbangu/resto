<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\CategorieArticle;
use App\Models\Devise;
use App\Models\Image;
use App\Models\Pointdevente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/articles",
     *     @OA\Response(response="201", description="Display a listing of the resource.")
     * )
     */
    public function index()
    {
        $articles = session()->has('LoggedUser') === true ?
            Article::with('commandes')
                ->with('categorie_article')
                ->with('pointdevente')
                ->with('devise')
                ->get() : response("Cette action n'est pas attachee a ce compte");

        $categories = CategorieArticle::all();

        $points = Pointdevente::all();

        $devises = Devise::all();

        if(request()->ajax())
        {
            return compact('articles', 'categories', 'points', 'devises');
        }

        return view('templates.pages.articles.index', compact('articles', 'categories', 'points','devises'));
    }

    /**
     * @OA\Post(
     *     path="/api/articles/create",
     *     @OA\Response(response="201", description="Store a newly created resource in storage.")
     * )
     */
    public function store(StoreArticleRequest $request)
    {
        if(session()->has('LoggedUser'))
        {
            $article = Article::create(
                [
                    'idcategorie_article' => $request->idcategorie_article,
                    'idpointdevente' => $request->idpointdevente,
                    'article' => $request->article,
                    'description' => $request->description,
                    'image' => $request->file("image")->store('images', 'public'),
                    'iddevise' => $request->iddevise,
                    'prix' => $request->prix
                ]
            );

            if($article === null)
            {
                return response(['error' => 'Echec de creation de l\'article.']);
            }

            return response(['message' => 'Article ajoute avec success.']);
        }
        else
        {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/articles/show/{id}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */
    public function show($id)
    {
        $article = Article::find($id);

        if($article === null)
        {
            return response("Aucune article n'a ete trouve.", 404);
        }

        return response($article, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/articles/search/{name}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */

    public function search(string $name)
    {
        $article = Article::where('article', 'like', '%'. $name .'%')->get();

        if(sizeof($article) === 0)
        {
            return response("Aucun article n'a ete trouve.");
        }

        return response($article, 200);

    }

    /**
     * @OA\Put(
     *     path="/api/articles/update/{id}",
     *     @OA\Response(response="200", description="Update the specified resource in storage.")
     * )
     */
    public function update(UpdateArticleRequest $request, $id)
    {

        if(session()->has('LoggedUser'))
        {
            $article = Article::find($id);

            if($article === null)
            {
                return response("Aucun article n'a ete trouve.", 404);
            }

            $article->update(
                [
                'idcategorie_article' => $request->idcategorie_article,
                'idpointdevente' => $request->idpointdevente,
                'article' => $request->article,
                'description' => $request->description,
                'image' => $request->file("image")->store('images', 'public'),
                'iddevise' => $request->iddevise,
                'prix' => $request->prix
            ]);

            return response($article, 200);
        }
        else
        {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

//    private function deleteOldImg(array $images) {
//        foreach ($images as $img)
//        {
//            Image::where('path', 'like', '%'.$img.'%')->delete();
//            File::delete(['path' => 'storage' . '/'. $img ]);
//        }
//    }

    /**
     * @OA\Delete(
     *     path="/api/articles/delete/{id}",
     *     @OA\Response(response="200", description="Remove the specified resource from storage.")
     * )
     */
    public function destroy($id)
    {
        if(session()->has('LoggedUser'))
        {
            $article = Article::find($id);

            if($article === null)
            {
                return response("Aucun article n'a pas ete trouve.");
            }

            $article->delete($id);

            return response("Article supprime avec succes.", 200);
        }
        else
        {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }
}
