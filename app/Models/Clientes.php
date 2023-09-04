<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable=['idciudad','iddepartamento','nombre','apellido','tipodocumento','numerodocumento','created_at','updated_at','activo','user_id','email'];
    protected $primarykey='idcliente';
    
}
