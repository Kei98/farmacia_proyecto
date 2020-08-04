<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];
    //    Revisar bien estos métodos
    public function linea_detalles() {
        return $this->hasMany("App\Linea_detalle", "venta_id");
    }
    public function usuariosC() {
        return $this->belongsTo("App\Usuario", "cliente_id");
    }
    public function usuariosP() {
        return $this->belongsTo("App\Usuario", "personal_id");
    }
}
