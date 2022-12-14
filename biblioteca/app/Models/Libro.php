<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'autor', 'editorial', 'año', 'unidades', 'imagen'];
    
    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function libros()
    {
        return $this->belongsToMany(Prestamo::class);
    }


}
