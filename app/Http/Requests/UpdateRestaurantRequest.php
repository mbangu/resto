<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            'idcategorie_restaurant' => 'required|numeric',
            'nom_restaurant' => 'required|max:30|string|unique:restaurant,nom_restaurant|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'name' => 'required|string|max:30|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'email' => 'required|string|unique:utilisateurs,email',
            'password' => 'required|string|confirmed|min:8',
            'adresse' => 'required|string|max:255',
            'contact' => 'required|string|max:14',
        ];
    
    }

    public function messages()
    {
        return [
            'idcategorie_restaurant.required' => "Une categorie attendue.",
            'nom_restaurant.required' => "Un nom est attendu.",
            'nom_restaurant.max' => "Un restaurant ne peut avoir un nom de plus de 30 caracteres.",
            'nom_restaurant.unique' => "Le nom d'un restaurant doit etre unique.",
            'nom_restaurant.regex' => "Le nom d'un restaurant doit commencer avec une lettre de l'alphabet.",
            'name.required' => "Un nom utilisateur attendu.",
            'name.string' => "Le nom d'utilisateur doit etre une chaine de caracteres.",
            'name.max' => "Le nom d'utilisateur ne peut avoir plus de 30 caracteres.",
            'name.regex' => "Le nom d'utilisateur doit commencer avec une lettre de l'alphabet.",
            'email.required' => "Une adresse mail est attendue.",
            "email.string" => "L'adresse mail doit etre une chaine de caracteres.",
            "email.unique" => "Cette adresse est  deja utilisee.",
            'password.required' => "Un mot de passe est attendu.",
            'password.string' => "Le mot de passe doit etre une chaine de carateres.",
            'password.confirmed' => "Veuillez saisir a nouveau le mot de passe.",
            'password.min' => "Le mot de passe ne peut avoir moins de 8 caracteres.",
            'adresse.required' => "Une adresse est attendue.",
            'adresse.string' => "L'adresse doit etre une chaine de carateres.",
            'adresse.max' => "L'adresse ne peut avoir plus de 255 caracteres.",
            'contact.required' => "Un numero de contact est attendu.",
            'contact.string' => "Le numero de contact doit etre une chaine de caracteres.",
            'contact.max' => "Le numero de contact ne peut avoir plus de 14 caracteres."
        ];
    }
}
