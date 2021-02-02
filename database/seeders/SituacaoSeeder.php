<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Situacao;
class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situacao::create(
            [
                'situacao' => 'Inscrito',
            ]
        );
        Situacao::create(
            [
                'situacao' => 'Em andamento',
            ]
        );
        Situacao::create(
            [
                'situacao' => 'Finalizado',
            ]
        );
        Situacao::create(
            [
                'situacao' => 'Rejeitado',
            ]
        );
    }
}
