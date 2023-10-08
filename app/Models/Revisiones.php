<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisiones extends Model
{
    use HasFactory;
    protected $fillable=['idrevision','idingreso','idvehiculo','costo','fecharevision','estado','cuandihizotcnmecanica'];
    protected $primarykey = 'idrevision';
}
