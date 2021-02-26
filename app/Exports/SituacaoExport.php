<?php

namespace App\Exports;

use App\Models\Situacao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SituacaoExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Situacao::select('id', 'situacao');
    }
    public function headings(): array
    {
        return [
            'Id',
            'nome',



        ];
    }
}
