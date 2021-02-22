<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
            'telefone'=> 'required|celular_com_ddd',
            'email'=> 'required|email:rfc,dns|unique:users',
            'nome_projeto' =>'required',
            'campus' => 'required',
            'area' => 'required',
            'problemas'=> 'required',
            'caracteristicas' => 'required',
            'publico_alvo'=>'required',
            'dificuldades' => 'required',
            'disponibilidade' => 'required',
            'resultados' => 'required',
            'nomeMentor' => 'required',
            'instituicao' => 'required',
            'areaMentor' => 'required',

        ];
    }

}
