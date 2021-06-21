<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida_Vehiculo extends Model
{
    protected $table='salida_vehiculos';

    protected $primaryKey='id_ticket';
    
    protected $fillable = ['ingreso_vehiculos_id_ingreso', 'total', 'fecha_salida'];
  
    protected $guarded=[];

    public $timestamps = false;

    public function ingreso_vehiculos()
    {
        return $this-> belongsTo ('App\Ingreso_Vehiculo');
    } 
}
