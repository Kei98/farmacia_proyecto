<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

    public function Company() {
        return $this->belongsTo("App\Provider", "id_company");
    }
    public function Drug() {
        return $this->hasMany("App\Drug", "id_drug");
    }
}
