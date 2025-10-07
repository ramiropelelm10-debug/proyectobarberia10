<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbero extends Model
{
    use HasFactory; // crea barberos aleatoriamente 

    protected $table = 'barberos';

    public $timestamps = true; // ← activo por defecto, opcional escribirlo

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'especialidad',
    ];
    // Un user tiene un barbero
public function barbero() {
    return $this->hasOne(Barbero::class, 'id_users');
}

}

