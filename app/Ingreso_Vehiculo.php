<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_Vehiculo extends Model
{
    protected $table='ingreso_vehiculos';

    protected $primaryKey='id_ingreso';
    
    protected $fillable = ['estado', 'vehiculos_id_vehiculo', 'users_id'];

    protected $dates = ['fecha_ingreso'];
  
    protected $guarded=[];

    public $timestamps = false;

    //Relacion con la tabla vehiculo
    public function vehiculos()
    {
    return $this->belongsTo('App\Vehiculo');
    }
}
