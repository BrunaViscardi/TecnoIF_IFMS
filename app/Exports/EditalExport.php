<?php

namespace App\Exports;

use App\Models\Edital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EditalExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Edital::select('id', 'nome', 'link', 'data','situacao');
    }
    public function headings(): array
    {
        return [
            'Id',
            'Nome do Edital',
            'Link',
            'Data de início',
            'Situação',




        ];
    }
}
