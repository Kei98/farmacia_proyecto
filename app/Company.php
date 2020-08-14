<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

    public function providers() {

        return $this->hasMany("App\Provider", "id_company");
    }
}
