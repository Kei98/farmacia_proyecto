<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa_prov extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];
    //    Revisar bien estos métodos
    public function proveedors() {
        return $this->hasMany("App\Proveedor", "empresa_prov_id");
    }
}
