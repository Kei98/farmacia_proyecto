<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos. Creo que es más una relación de 1:1
    public function medicamentos() {
        return $this->hasMany("App\Medicamento", "medicamento_id");
    }
}
