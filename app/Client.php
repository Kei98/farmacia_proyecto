<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];


//    cambiar
    public function providers() {

        return $this->hasMany("App\Provider", "id_company");
    }
}
