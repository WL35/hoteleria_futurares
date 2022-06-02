<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temporada extends Model
{
    public $timestamps=false;
    protected $table='temporada';
    protected $primaryKey='tem_id';

    protected $fillable=[
    'tem_nombre','tem_valor',
    ];
}
