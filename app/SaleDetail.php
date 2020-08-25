<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

    public function detail_lines() {
        return $this->hasMany("App\Detail_line", "id_detail_line");
    }
    public function sales() {
        return $this->hasMany("App\Sale", "id_sale");
    }
}
