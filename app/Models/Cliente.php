<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    protected $table='clientes';
    protected $primaryKey='id';
    protected $fillable=['nombre','apellido','telefono','email'];
    public $timestamps=true;
    
    // relaciones 
    public function usuario(): HasOne{
        return $this->hasOne(User::class);
    }
}
