<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_detalles', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_med", 60);
            $table->double("precio_u_med");
            $table->integer("cantidad");
            $table->double("subtotal");
            $table->foreignId("venta_id")->references("id")->on("ventas");
            $table->foreignId("medicamento_id")->references("id")->on("medicamentos");
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
        Schema::dropIfExists('linea_detalles');
    }
}
