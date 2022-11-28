<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() //parte de segurança
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() //validações
    {
        return [
            'nome' => ['required', 'min:3']
        ];
    }

    /*
    public function messages()
    {
        // podemos colocar mensagens personalizadas aqui para cada uma das regras (rules) de validacao. Ex:
        // return [
        //    'nome.required' => 'O campo NOME é obrigatório'
        //]
    
    } */
}
