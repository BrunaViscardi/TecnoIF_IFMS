<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id','nome','email','senha'
    ];
    public static function get($filtro = '%')
    {
        return Gestor::where('nome', 'LIKE', '%' . $filtro . '%')
            ->orWhere('gestores.email', 'LIKE', '%' . $filtro . '%')
            ->get();
    }
}
