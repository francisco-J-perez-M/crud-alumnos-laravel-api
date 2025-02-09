<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table = 'tb_universidad';
    protected $primaryKey = 'id_universidad';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'clave',
    ];
}
