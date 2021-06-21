<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='id_cliente';
  
    public $timestamps=false;
    protected $fillable = ['num_documento'];
}
