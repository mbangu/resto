<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUtilisateurRequest extends FormRequest
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
            'name' => 'required|max:30|string|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Un nom d'utilisateur est attendu.",
            'name.max' => "Le nom d'utilisateur ne peut avoir plus de 30 caracteres.",
            'name.string' => "Le nom d'utilisateur doit etre une chaine de caracteres.",
            'name.regex' => "Le nom d'utilisateur doit commencer avec une lettre de l'alphabet.",
            'password.required' => "Un mot de passe est attendu.",
            'password.string' => "Le mot de passe doit etre une chaine de caracteres.",
            'password.min' => "Le mot de passe ne doit pas avoir moins de 8 caracteres."
        ];
    }
}
