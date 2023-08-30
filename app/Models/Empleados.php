<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $fillable=['idempleado','iduser','documento','nombre','apellido','email','created_at','updated_at'];
    protected $primarykey='idempleado';
}
