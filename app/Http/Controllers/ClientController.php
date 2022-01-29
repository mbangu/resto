<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/clients",
     *     @OA\Response(response="200", description="Display a listing of the resource.")
     * )
     */
    public function index()
    {
        $clients = session()->has('LoggedUser') === true ?
            Client::with('restaurant')->get() : response("Cette action n'est pas attachee a ce compte.", 401);

        if (request()->ajax()) {
            return $clients;
        }

        return view('templates.pages.clients.index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/clients/show/{id}",
     *     @OA\Response(response="200", description="Display the specified resource.")
     * )
     */
    public function show($id)
    {
        $client = Client::with('commandes')->find($id);

        if ($client === null) {
            return response("Aucune client n'a ete trouve.", 404);
        }

        return response($client, 200);
    }

    // public function edit($id)
    // {
    //     $client = Client::with('commandes')->find($id);

    //     $reponse = $client !== null ? view('templates.pages.clients.edit', compact('client')) : redirect()->back()->with('error','Aucun client  n\'a ete trouve.');

    //     return $reponse;
    // }

    /**
     * @OA\Put(
     *     path="/api/clients/update/{id}",
     *     @OA\Response(response="200", description="Update the specified resource in storage.")
     * )
     */
    public function update(UpdateClientRequest $request, $id)
    {
        if (session()->has('LoggedUser')) {
            $client = Client::with('commandes')->find($id);

            if ($client === null) {
                return response("Aucun client n'a ete trouve.", 404);
            }

            // var_dump(json_encode($request->all(), JSON_PRETTY_PRINT));die();

            $client->update($request->validated());

            return response(['message' => 'Client mis a jour avec succes.']);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/clients/delete/{id}",
     *     @OA\Response(response="200", description="Remove the specified resource from storage.")
     * )
     */
    public function destroy($id)
    {
        if (session()->has('LoggedUser')) {
            $client = Client::with('commandes')->find($id);

            if ($client === null) {
                return response("Aucun client n'a ete trouve.", 404);
            }

            $client->delete($id);

            return response(["message" => "Client supprime avec succes."], 200);
        } else {
            return response("Cette action n'est pas attachee a ce compte.", 401);
        }
    }
}
