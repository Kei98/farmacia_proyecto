<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_line extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos
    public function sales() {
        return $this->belongsTo("App\Sale", "id_sale");
    }
    public function drugs() {
        return $this->hasMany("App\Drug", "id_drug");
    }
}
