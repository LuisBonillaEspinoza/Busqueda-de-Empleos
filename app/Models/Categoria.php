<?php

namespace App\Models;

use App\Models\Vacante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    const table = 'categorias';

    public function vacantes(){
        return $this->belongsToMany(Vacante::class);
    }
}
