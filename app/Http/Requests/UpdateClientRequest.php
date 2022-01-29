<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'client' => 'string|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
            'telephone' => 'string',
        ];
    }

    public function messages()
    {
        return  [
            'client.string' => "Le nom d'utilisateur doit etre une chaine de caracteres.",
            'client.regex' => "Le nom du client doit commencer avec une lettre de l'alphabet.",
            'telephone.string' => "Le numero de telephone doit etre une chaine de caracteres.",
        ];
    }
}
