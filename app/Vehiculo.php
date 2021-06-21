<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table='vehiculos';

    protected $primaryKey='id_vehiculo';
  
    public $timestamps=false;
    protected $fillable = ['tipo_vehiculos_id_tipo', 'placa'];

    public function ingreso_vehiculo()
    {
    return $this->hasManythrough(Ticket::class,Ingreso_Vehiculo::class);
    } 
}
