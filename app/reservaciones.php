<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservaciones extends Model
{
    public $timestamps=false;
    protected $table='reservaciones';
    protected $primaryKey='res_id';

    protected $fillable=[
    'res_adultos','res_niños','res_f_llegada','res_f_salida','res_noches','res_estado','res_total','cli_id','hab_id','usu_id',
    ];
}
