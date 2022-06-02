<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    public $timestamps=false;
    protected $table='facturas';
    protected $primaryKey='fac_id';

    protected $fillable=[
    'cli_id','fac_fecha','fac_tipo_pago',
    ];
}
