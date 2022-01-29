<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServeurRequest extends FormRequest
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
           'name' => 'required|string|min:5|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
           'idrestaurant' => 'required',
           'serveur' => 'required|string|min:5|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
           'password' => 'required|string|min:8|confirmed',
           'email' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Un nom d'utilisateur est attendu.",
            'name.string' => "Le nom d'utilisateur doit etre une chaine de caracteres.",
            'name.min' => "Le nom d'utilisateur ne pas avoir moins de 5 caracteres.",
            'name.regex' => "Le nom d'utilisateur doit commencer avec une lettre.",
            'idrestaurant' => "Veuillez selectionner un restaurant.",
            'serveur.required' => "Le nom du serveur est attendu.",
            'serveur.string' => "Le nom du serveur doit etre une chaine de caracteres.",
            'serveur.min' => "Le nom du serveur ne pas avoir moins de 5 caracteres.",
            'serveur.regex' => "Le nom du serveur doit commencer avec une lettre.",
            'password.required' => "Un mot de passe est attendu.",
            'password.string' => "Le mot de passe doit etre une chaine de carateres.",
            'password.confirmed' => "Veuillez saisir a nouveau le mot de passe.",
            'password.min' => "Le mot de passe ne peut avoir moins de 8 caracteres.",
            'email.required' => "Une adresse mail est attendue.",
            "email.string" => "L'adresse mail doit etre une chaine de caracteres.",
        ];
    }
}
