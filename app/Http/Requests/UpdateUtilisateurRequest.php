<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUtilisateurRequest extends FormRequest
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
            'name' => 'required|string|max:30|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'email' => 'required|string|',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Un nom utilisateur attendu.",
            'name.string' => "Le nom d'utilisateur doit etre une chaine de caracteres.",
            'name.max' => "Le nom d'utilisateur ne peut avoir plus de 30 caracteres.",
            'name.regex' => "Le nom d'utilisateur doit commencer avec une lettre de l'alphabet.",
            'email.required' => "Une adresse mail est attendue.",
            "email.string" => "L'adresse mail doit etre une chaine de caracteres.",
            'password.required' => "Un mot de passe est attendu.",
            'password.string' => "Le mot de passe doit etre une chaine de carateres.",
            'password.confirmed' => "Veuillez saisir a nouveau le mot de passe.",
            'password.min' => "Le mot de passe ne peut avoir moins de 8 caracteres.",
        ];
    }
}
