<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentorado_projeto extends Model
{
    use HasFactory;
    protected $table = 'mentorados_projetos';
    public function Mentorados()
    {
        return $this->morphToMany(Mentorado::class, 'mentorado_id');
    }
    public function Projetos()
    {
        return $this->morphToMany(Projeto::class, 'projeto_id');
    }
}
