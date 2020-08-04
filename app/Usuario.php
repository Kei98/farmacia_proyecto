<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function ventasC() {
        return $this->hasMany("App\Venta", "cliente_id");
    }

    public function ventasP() {
        return $this->hasMany("App\Venta", "personal_id");
    }
}
