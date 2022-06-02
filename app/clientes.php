<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    public $timestamps=false;
    protected $table='clientes';
    protected $primaryKey='cli_id';

    protected $fillable=[
    'cli_nombre','cli_apellido','cli_cedula','email','cli_telefono','cli_direccion',
    ];
}
