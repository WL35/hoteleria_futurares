<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class habitaciones extends Model
{
    public $timestamps=false;
    protected $table='habitaciones';
    protected $primaryKey='hab_id';

    protected $fillable=[
    'hab_detalle','hab_estado','tip_id',
    ];
}
