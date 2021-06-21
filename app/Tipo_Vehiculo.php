<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Vehiculo extends Model
{
    protected $table='tipo_vehiculos';

    protected $primaryKey='id_tipo';
  
    public $timestamps=false;
    protected $fillable = ['nombre', 'descripcion'];
    
    public function tarifa()
    {
        return $this->hasMany('App\Tarifa');
    }
}
