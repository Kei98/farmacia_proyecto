<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_drug")->references("id")->on("drugs")->onDelete("cascade");
            $table->double("amount");
            $table->double("subtotal");
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
        Schema::dropIfExists('detail_lines');
    }
}
