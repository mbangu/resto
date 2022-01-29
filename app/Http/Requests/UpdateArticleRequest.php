<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
        return [
            'idcategorie_article' => 'required',
            'idpointdevente' => 'required',
            'article' => 'required',
            'description' => 'required',
            'iddevise' => 'required',
            'prix' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idcategorie_article.required' => "Veuillez selectionner une categorie.",
            'idpointdevente.required' => "Veuillez selectionner un point de vente.",
            'article.required' => "Veuillez saisir le nom de l'article.",
            'description.required' => "Une description est attendue.",
            'iddevise.required' => "Veuillez selectionner une devise.",
            'prix.required' => "Veuillez saisir le prix de l'article."
        ];
    }
}
