<?php

namespace App\Exports;

use App\Models\Mentorado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MentoradoExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Mentorado::select('id', 'nome','data_nascimento', 'campus', 'curso', 'periodo', 'turno', 'telefone', 'cpf', 'rg', 'anexo', 'banco', 'agencia', 'conta', 'endereco', 'email', 'bairro', 'numero', 'complemento');
    }
    public function headings(): array
    {
        return [
            'Id',
            'Nome',
            'Data de nascimento',
            'Campus',
            'Curso',
            'Período',
            'Turno',
            'Celular',
            'CPF',
            'RG',
            'Dados Bancários',
            'Banco',
            'Agência',
            'Conta',
            'Endereço',
            'Email',
            'Bairro',
            'Número',
            'Complemento',


        ];
    }
}
