<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;
    protected $fillable=['idciudad','iddepartamento','nombre'];
    protected $primaryKey='idciudad';
}
