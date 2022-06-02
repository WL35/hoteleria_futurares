<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    //

    public $timestamps=false;
    protected $table='facturas_detalle';
    protected $primaryKey='fad_id';

    protected $fillable=[
    'fac_id',
    'hab_id',
  
     ];

}
