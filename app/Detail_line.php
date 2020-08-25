<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_line extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos
    public function sale_details() {
        return $this->belongsTo("App\SaleDetail", "id_detail_line");
    }
    public function drugs() {
        return $this->hasMany("App\Drug", "id_drug");
    }
}
