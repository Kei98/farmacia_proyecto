<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

    public function sale_details() {
        return $this->belongsTo("App\SaleDetail", "id_sale");
    }

    public function clients() {
        return $this->belongsTo("App\User", "id_client");
    }

    public function staffs() {
        return $this->belongsTo("App\User", "id_staff");
    }
}
