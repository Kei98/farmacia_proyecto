<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

    public function companies() {
        return $this->belongsTo("App\Company", "id_company");
    }
    public function drugs() {
        return $this->hasMany("App\Drug", "id_provider");
    }
}
