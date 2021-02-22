<?php

namespace App\Exports;

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
      $sheets = [

      ]; $sheets[] = new ProjetosExport( Mentorado::all()  );
      return $sheets;
   }
}
