<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCocktailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'descrizione' => 'nullable',
            'prezzo' => 'required',
            'colore' => 'required',
            'e_alcolico' => 'required',
            'ingredients' => 'exists:ingredients,id',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'Campo obbligatorio',
            'prezzo.required' => 'Campo obbligatorio',
            'colore.required' => 'Campo obbligatorio',
            'e_alcolico.required' => 'Campo obbligatorio',
            'ingredients.exists' => 'Campo non valido',
        ];
    }
}
