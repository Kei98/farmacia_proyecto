<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_detalle extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos
    public function ventas() {
        return $this->belongsTo("App\Venta", "venta_id");
    }
    public function medicamentos() {
        return $this->hasMany("App\Medicamento", "medicamento_id");
    }
}
