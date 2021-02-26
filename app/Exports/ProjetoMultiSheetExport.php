<?php

namespace App\Exports;

use App\Imports\EditalImport;
use App\Imports\MentoradoImport;
use App\Imports\SituacaoImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\Mentorado;

class ProjetoMultiSheetExport implements  withMultipleSheets
{

    protected $request;
    private $filtro, $situacao;

    public function __construct($request)
    {
        $this->request = $request;
        $this->filtro = $request->filtro ?? '%';
        $this->situacao = $request->situacao ?? '%';
    }

    public function sheets(): array
    {
        return [
           'Projetos' => new ProjetosExport($this->request),
            'Mentorados' => new MentoradoExport(),
            'Edital' => new EditalExport(),
            'Situção' => new SituacaoExport(),
        ];
    }
}
