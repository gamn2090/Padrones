<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class padron extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'ruc',
    'razon_social',
    'estado_contribuyente',
    'condicion_domicilio',
    'ubigeo',
    'tipo_via',
    'nombre_via',
    'codigo_zona',
    'tipo_zona',
    'numero',
    'interior',
    'lote',
    'departamento',
    'manzana',
    'kilometro'
    ];
}
