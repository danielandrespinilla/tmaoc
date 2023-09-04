<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    use HasFactory;
    protected $fillable=['idadministrador ','nombre','apellido','telefono','numerodocumento','email','tipo','created_at','updated_at','user_id'];
    protected $primarykey='idadministrador';
}
