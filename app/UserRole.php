<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table='role_user';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =['role_id','user_id'];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}


