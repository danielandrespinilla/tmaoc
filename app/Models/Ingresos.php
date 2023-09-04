<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    protected $fillable=['idingreso','idadministrador','idvehiculo','fechahoraingreso','fechahorasalida','fechahoradiagnostico'];
    protected $primarykey = 'idingreso';
}
