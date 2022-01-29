<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\Article;
use App\Models\ArticleCommande;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Devise;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class CommandeController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/commandes",
     *     @OA\Response(response="200", description="Display a listing of the resource.")
     * )
     */
    public function index()
    {
        $commandes = session()->has('LoggedUser') === true ?

            Commande::where('valide', 0)
            ->with('articles')
            ->with('client')
            ->with('serveur')
            ->with('table')
            ->get() :

            response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);


        if (request()->ajax()) {
            return response($commandes);
        }


        return view('templates.pages.commandes.index', compact('commandes'));
    }

    public  function livraisons()
    {

        $commandes = session()->has('LoggedUser') === true ?

            Commande::where('valide', 1)
            ->with('articles')
            ->with('client')
            ->with('serveur')
            ->with('table')
            ->get() :

            response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);


        if (request()->ajax()) {
            return response($commandes);
        }

        return view('templates.pages.commandes.livraisons.livraisons', compact('commandes'));
    }

    /**
     * @OA\Post(
     *     path="/api/commandes/create",
     *     @OA\Response(response="200", description="Store a newly created resource in storage.")
     * )
     */
    public function store(StoreCommandeRequest $request)
    {


        $articles = explode(",", $request->idarticle);
        $quantites_articles = explode(",", $request->qte);
        $prix_articles = explode(",", $request->prix);


        if (session()->has('LoggedUser')) {
            $client = Client::find($request->idclient);

            if ($client === null) {

                // Client

                $code_client = 'client-' . uniqid();

                $newClient = [
                    'idrestaurant' => auth()->user()->id,
                    'client' => $request->nom_client,
                    'code' => $code_client,
                    'date_creation' => now()
                ];

                Client::create($newClient);


                // Commande

                $clientid = Client::where('code', $code_client)->first()->idclient;

                $num_cmd = 'cmd-' . uniqid();

                $commande = Commande::create(
                    [
                        'idtable' => $request->idtable,
                        'idserveur' => $request->idserveur,
                        'idclient' => $clientid,
                        'nom_client' => $request->nom_client,
                        'numero_cmd' => $num_cmd,
                        'date' => now(),
                    ]
                );

                // Articles commandes

                for ($i = 0; $i < sizeof($articles), $i < sizeof($quantites_articles), $i < sizeof($prix_articles); $i++) {

                    $article_commande = ArticleCommande::create(
                        [
                            'idarticle' => $articles[$i],
                            'idcommande' => Commande::where('numero_cmd', $num_cmd)->first()['idcommande'],
                            'qte' => $quantites_articles[$i],
                            'prix' => $prix_articles[$i],
                            'devise' => $request->devise,
                            'date' => now(),
                            'pretalivre' => false
                        ]
                    );
                }

                $articles_trouves = [];

                for ($index = 0; $index < sizeof($articles); $index++) {

                    $art = Article::find($index);

                    if ($art != null) {
                        array_push($articles_trouves, $art);
                    }
                }

                $commande_data = [
                    'commande' => $commande,
                    'client' => $newClient,
                    'articles' => $articles_trouves,
                ];

                return response($commande_data, 201);
            }


            // Commande avec client existant

            $num_cmd = 'cmd-' . uniqid();

            $commande = Commande::create(
                [
                    'idtable' => $request->idtable,
                    'idserveur' => $request->idserveur,
                    'idclient' => $request->idclient,
                    'nom_client' => $request->nom_client,
                    'numero_cmd' => $num_cmd,
                    'date' => now(),
                ]
            );

            // Articles commandes




            for ($i = 0; $i < sizeof($articles), $i < sizeof($quantites_articles), $i < sizeof($prix_articles); $i++) {

                $article_commande = ArticleCommande::create(
                    [
                        'idarticle' => $articles[$i],
                        'idcommande' => Commande::where('numero_cmd', $num_cmd)->first()['idcommande'],
                        'qte' => $quantites_articles[$i],
                        'prix' => $prix_articles[$i],
                        'devise' => $request->devise,
                        'date' => now(),
                        'pretalivre' => false
                    ]
                );
            }

            $articles_trouves = [];

            for ($index = 0; $index < sizeof($articles); $index++) {

                $art = Article::find($index);

                if ($art != null) {
                    array_push($articles_trouves, $art);
                }
            }

            $commande_data = [
                'commande' => $commande,
                'client' => $client,
                'articles' => $articles_trouves,
            ];

            return response($commande_data, 201);
        } else {
            return response("Cette action n'est pas attachee a ce compte.");
        }
    }

    /**
     * @OA\Get(
     *     path="/api/commandes/show/{id}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */
    public function show($id)
    {
        if (session()->has('LoggedUser')) {
            $commande = Commande::with('articles')->with('client')->find($id);

            if ($commande === null) {
                return response("Aucune comande n'a ete trouvee.", 404);
            }

            return response($commande, 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/commandes/update/{id}",
     *     @OA\Response(response="200", description="Update the specified resource in storage.")
     * )
     */
    public function update(UpdateCommandeRequest $request, $id)
    {
        if (session()->has('LoggedUser')) {

            $commande = Commande::with('articles')->find($id);

            if ($commande === null) {
                return response("Aucune commande n'a a ete trouvee.", 404);
            }

            $commande->update($request->all());

            return response($commande, 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    public function validatecmd(Request $request, $id)
    {

        if (session()->has('LoggedUser')) {

            $commande = Commande::with('articles')->find($id);

            if ($commande === null) {
                return response("Aucune commande n'a a ete trouvee.", 404);
            }

            $commande->where('idcommande', $id)
                ->update($request->all());

            return response($commande, 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/commandes/delete/{id}",
     *     @OA\Response(response="200", description="Remove the specified resource from storage.")
     * )
     */
    public function destroy($id)
    {

        if (session()->has('LoggedUser')) {
            $commande = Commande::with('articles')->with('client')->find($id);

            if ($commande === null) {
                return response("Aucune comande n'a ete trouvee.", 404);
            }

            $commande->delete($id);

            return response("Commande supprimee avec succes.", 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/commandes/searchByNumCmd/{num_cmd}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */
    public function searchByNumCmd(string $num_cmd)
    {
        if (session()->has('LoggedUser')) {
            $commande = Commande::with('articles')->with('client')->where('numero_cmd', $num_cmd)->get();

            if (sizeof($commande) === 0) {
                return response("Aucune comande n'a ete trouvee.", 404);
            }

            return response($commande, 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/commandes/searchByNomClient/{nom_client}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */
    public function searchByNomClient(string $nom_client)
    {
        if (session()->has('LoggedUser')) {
            $commande = Commande::with('articles')->where('nom_client', $nom_client)->get();

            if (sizeof($commande) === 0) {
                return response("Aucune comande n'a ete trouvee.", 404);
            }

            return response($commande, 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }


    public function stats()
    {
        //        $commandes = Commande::where('idrestaurant', session()->get('LoggedUser')->id)->get();


        $mois = [
            "Janvier" => 1, "Février" => 2, "Mars" => 3, "Avril" => 4, "Mai" => 5, 'Juin' => 6, 'Juillet' => 7, 'Aout' => 8,
            'Septembre' => 10, 'Octobre' => 11, 'Novembre' => 11, 'Decembre' => 12
        ];

        $id_user  = session()->get('LoggedUser')->id;


        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $id_res = Restaurant::where('iduser_restaurant', $id_user)->pluck('idrestaurant')->all();

        $id_cl = Client::whereIn('idrestaurant', $id_res)->pluck('idclient')->all();
        $devise = Devise::all();
        $_d = $devise->pluck('devise')->all();
        $empty = [];
        foreach ($_d as $e) {
            array_push($empty,  ['devise' => $e, 'total' => 0]);
        }
        $data = [];

        $d = [];

        $test = [];

        $montant = $final = [];
        foreach ($devise as $dev) {
            foreach ($mois as $k => $v) {
                $tabArt = [];
                $cmds_tab =  Commande::with('articles')->whereMonth('date', $v)->whereIn('idclient', $id_cl)->get();
                foreach ($cmds_tab as $cm_tab) {
                    foreach ($cm_tab->articles as $art) {
                        if ($art->devise == $dev->devise) {
                            array_push($tabArt, $art);
                        }
                    }
                }
                $total = 0;
                foreach ($tabArt as $article) {
                    if ($article->devise == $dev->devise) {
                        $total += $article->qte * $article->prix;
                    }
                }
                array_push($montant, $total);
            }

            array_push($final, [$dev->devise => $montant]);
            $montant = [];

        }

        if (request()->ajax()) {
            return ['data' => $final, 'devise' => $_d];
        }
    }
}
