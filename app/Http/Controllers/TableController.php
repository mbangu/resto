<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Espace;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

     /**
    * @OA\Get(
    *     path="/api/tables",
    *     @OA\Response(response="200", description="Display a listing of the resource.")
    * )
    */
    public function index()
    {
        $tables = session()->has('LoggedUser') === true ? Table::with('espace')->with('restaurant')->get()
        : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);

        $espaces = Espace::all();

        $restaurants = Restaurant::all();

        if(request()->ajax())
        {
            return response(['tables' => $tables, 'espaces' => $espaces]);
        }

        return view('templates.pages.tables.index', compact('tables', 'espaces', 'restaurants'));
    }


     /**
    * @OA\Post(
    *     path="/api/tables/create",
    *     @OA\Response(response="201", description="Store a newly created resource in storage.")
    * )
    */
    public function store(StoreTableRequest $request)
    {
        // var_dump($request->all());die();

        if(session()->has('LoggedUser'))
        {
            $table = Table::create($request->all());

            return response($table, 201);
        }
        else
        {
           return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }


     /**
    * @OA\Get(
    *     path="/api/tables/show/{id}",
    *     @OA\Response(response="200", description="Display the specified resource.")
    * )
    */
    public function show($id)
    {
        $table = Table::find($id);

        if($table === null)
        {
            return response("Aucune table n'a ete trouvee .", 404);
        }

        return response($table, 200);
    }

    /**
    * @OA\Put(
    *     path="/api/tables/update/{id}",
    *     @OA\Response(response="200", description="Update the specified resource in storage.")
    * )
    */
    public function update(UpdateTableRequest $request, $id)
    {
        if(session()->has('LoggedUser'))
        {
            $table = Table::find($id);

            if($table === null)
            {
                return response("Aucune table n'a ete trouvee .", 404);
            }

            $table->update($request->all());

            return response($table, 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }

    /**
    * @OA\Delete(
    *     path="/api/tables/delete/{id}",
    *     @OA\Response(response="200", description="Remove the specified resource from storage.")
    * )
    */
    public function destroy($id)
    {
        if(session()->has('LoggedUser'))
        {
            $table = Table::find($id);

            if($table === null)
            {
                return response("Aucune table n'a ete trouvee .", 404);
            }

            $table->delete($id);

            return response("Table supprimee avec succes.", 200);
        }

        else
        {
            return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }
}
