<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table='tarifa_vehiculos';

    protected $primaryKey='id_tarifa';
  
    public $timestamps=false;
    protected $fillable = ['tipo_vehiculos_id_tipo','valor_hora', 'estado'];

    public function tipo_vehiculos()
    {
        return $this->belongsTo('App\Tipo_Vehiculo');
    }
}

