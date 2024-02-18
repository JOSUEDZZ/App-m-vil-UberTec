<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notis extends Model
{
    protected $table = 'notificaciones'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Nombre de la columna de la clave primaria (por defecto es 'id')
    public $timestamps = false;
    // Aquí puedes definir las columnas que son llenables (fillable) en el modelo
    //protected $fillable = ['titulo', 'autor', 'publicacion', 'descripcion'];
    use HasFactory;
}