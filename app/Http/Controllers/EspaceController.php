<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Espace;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class EspaceController extends Controller
{


    public function index()
    {

        $restaurant = Restaurant::where('iduser_restaurant', session()->get('LoggedUser')->id)->first()->idrestaurant;

        $espaces = session()->has('LoggedUser') === true ? Espace::where('idrestaurant', $restaurant)->with('restaurant')->with('tables')->get()

        : response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);

        $restaurants = Restaurant::all();

        // var_dump(json_encode($espaces, JSON_PRETTY_PRINT));die();


        if(request()->ajax())
        {
            return response(['restaurants' => $restaurants, 'espaces' => $espaces]);
        }

        return view('templates.pages.espaces.index', compact('espaces', 'restaurants'));
    }


    public function store(Request $request)
    {
        // var_dump($request->all());die();
        $restaurant = Restaurant::where('iduser_restaurant', session()->get('LoggedUser')->id)->first()->idrestaurant;

        if(session()->has('LoggedUser'))
        {
            $table = Espace::create([
                'name' => request()->name,
                'nb_tables' => request()->nb_tables,
                'idrestaurant' => $restaurant,
            ]);

            return response($table, 201);
        }
        else
        {
           return response('Cette action n\'est pas attachee a ce compte utilisateur.', 401);
        }
    }



    public function show($id)
    {
        $table = Espace::find($id);

        if($table === null)
        {
            return response("Aucune table n'a ete trouvee .", 404);
        }

        return response($table, 200);
    }


    public function update(Request $request, $id)
    {
        if(session()->has('LoggedUser'))
        {
            $table = Espace::find($id);

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


    public function destroy($id)
    {
        if(session()->has('LoggedUser'))
        {
            $table = Espace::find($id);

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
