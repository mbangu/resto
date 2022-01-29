<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePointdeventeRequest extends FormRequest
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
            'idrestaurant' => 'required',
            'pointdevente' => 'required|string|min:5|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'description' => 'required|string|min:5'
        ];
    }

    public function messages()
    {
        return [
            'pointdevente.required' => "Le nom du point de vente est attendu.",
            'pointdevente.string' => "Le nom du point de vente doit etre une chaine de caracteres.",
            'pointdevente.min' => "Le nom du point de vente ne pas avoir moins de 5 caracteres.",
            'pointdevente.regex' => "LLe nom du point de vente doit commencer avec une lettre.",
            'pointdevente.unique' => 'Le nom du point de vente doit etre unique.',
            'idrestaurant.required' => "Veuillez selectionner un restaurant.",
            'description.required' => "La description du point de vente est attendue.",
            'description.string' => "La description du point de vente doit etre une chaine de caracteres.",
        ];
    }
}
