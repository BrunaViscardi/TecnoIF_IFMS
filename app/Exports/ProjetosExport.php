<?php

namespace App\Exports;
use App\Models\Projeto;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjetosExport implements FromQuery, WithHeadings
{
    protected $request;
    private $filtro, $situacao;

    public function __construct($request)
    {
        $this->request = $request;
        $this->filtro = $request->filtro ?? '%';
        $this->situacao = $request->situacao ?? '%';
    }
    /**
     * @return Collection
     */

    public function query()
    {
        $filtro = $this->filtro;
        $situacao = $this->situacao;
        return Projeto::where(function ($query) use ($filtro) {
            $query->where('nome_projeto', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.area', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.campus', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.email', 'LIKE', '%' . $filtro . '%')
                ->orWhereHas('edital', function($q) use ($filtro)
                {
                    $q->where('nome', 'like', '%' . $filtro . '%');
                })
                ->orWhereHas('situacao', function($q) use ($filtro)
                {
                    $q->where('situacao', 'like', '%' . $filtro . '%');
                })
            ;
        })
            ->where(function ($query) use ($situacao) {
                $query->whereHas('edital', function($q) use ($situacao)
                {
                    $q->where('situacao', 'like', '%' . $situacao . '%');
                });
            });
    }

    public function headings(): array
    {
        return [
            'Id',
            'Id bolsista',
            'Id situacao',
            'Id edital',
            'Projeto',
            'Justificativa',
            'Campus',
            'Área',
            'Problemas/necessidades do projeto',
            'Características e diferenciais da solução',
            'Público alvo',
            'Dificuldades e necessidades',
            'Disponibilidade e motivação',
            'Resultados esperados',
            'Mentor',
            'Instuição do Mentor',
            'Área de atuação do Mentor',
            'E-mail do mentor',
            'Telefone do mentor',
            'Criação do projeto',
            'última atualização do projeto',






        ];
    }

}
