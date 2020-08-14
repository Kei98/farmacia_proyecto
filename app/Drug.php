<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];

//    Revisar bien estos métodos
    public function providers() {
        return $this->belongsTo("App\Provider", "id_provider");
    }
    public function inventories() {
        return $this->belongsTo("App\Inventory", "id_drug");
    }
    public function detail_lines() {
        return $this->belongsTo("App\Detail_line", "id_sale");
    }
}
