<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos
    public function proveedors() {
        return $this->belongsTo("App\Proveedor", "proveedor_id");
    }
    public function inventarios() {
        return $this->belongsTo("App\Inventario", "medicamento_id");
    }
    public function linea_detalles() {
        return $this->belongsTo("App\Linea_detalle", "venta_id");
    }
}
