<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    public $timestamps=false;
    protected $table='tipo';
    protected $primaryKey='tip_id';

    protected $fillable=[
    'tip_nombre','tip_camas','tip_precio','tem_id',
    ];
}
