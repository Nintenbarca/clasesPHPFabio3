<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $fillable = [
        'titulo', 'resumen', 'contenido', 'categoria', 'palabras'
    ];
}
