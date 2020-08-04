<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos
    public function empresa_provs() {
        return $this->belongsTo("App\Empresa_prov", "empresa_prov_id");
    }

    public function medicamentos() {
        return $this->hasMany("App\Medicamento", "medicamento_id");
    }
}
