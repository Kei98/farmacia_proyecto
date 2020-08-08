<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date("fecha"); /**not null genera auto*/
            $table->double("descuento");
            $table->double("impuesto");
            $table->double("montofinal");
            $table->foreignId("personal_id")->references("id")->on("usuarios");
            $table->foreignId("cliente_id")->references("id")->on("usuarios");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
