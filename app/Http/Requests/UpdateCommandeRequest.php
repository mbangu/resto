<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // |regex:/(^([a-zA-z ]+)(\d+)?$)/u
        return [
            'idtable' => 'required',
            'idserveur' => 'required',
            'nom_client' => 'required',
            'idarticle' => 'required',
            'qte' => 'required',
            'prix' => 'required',
            'devise' => 'required',
        ];
    }

    public function messages()
    {
        //  'nom_client.regex' => "Le nom du client doit commencer avec une lettre de l'alphabet."
        return [
            'idtable.required' => "Veuillez selectionner une table.",
            'idserveur.required' => "Veuillez saisir le nom du serveur.",
            'nom_client.required' => "Le nom du client est attendu",
            'idarticle' => "Veuillez selecionner au moins un article.",
            'qte' => "Veuillez preciser la quantite.",
            'prix' => "Veuillez saisir le prix de de l'aricle.",
            'devise' => "Veuillez preciser la devise.",
        ];
    }
}
