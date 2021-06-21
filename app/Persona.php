<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='num_documento';
  
    public $timestamps=false;
    protected $fillable = ['num_documento', 'nombre', 'apellido', 'contacto', 'email'];
}
