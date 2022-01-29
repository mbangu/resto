<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategorieRestaurantRequest extends FormRequest
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
            'categorie' => 'required|max:30|string',
            'description' => 'required|max:255|string'
        ];
    }

    public function messages()
    {
        return [

            'categorie.required' => "Un nom est attendu.",
            'categorie.max' => "Le nom de la categorie ne peut avoir plus de 30 caracteres",
            'categrorie.string' => "Le nom de la categorie doit etre une chaine de carateres.",
            'description.required' => "Une description est attendue.",
            'description.max' => "La descritpion d'une categorie ne peut avoir plus de 255 caracteres",
            'descritpion.string' => "La description d'une categorie doit etre une chaine de caracteres."

        ];
    }
}
