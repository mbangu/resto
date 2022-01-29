<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServeurRequest extends FormRequest
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
    public function rules(): array
    {
        return [
           'idrestaurant' => 'required',
           'serveur' => 'required|string|min:5|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
        ];
    }

    public function messages(): array
    {
        return [
            'idrestaurant' => "Veuillez selectionner un restaurant.",
            'serveur.required' => "Le nom du serveur est attendu.",
            'serveur.string' => "Le nom du serveur doit etre une chaine de caracteres.",
            'serveur.min' => "Le nom du serveur ne pas avoir moins de 8 caracteres.",
            'serveur.regex' => "Le nom du serveur doit commencer avec une lettre.",
        ];
    }
}
