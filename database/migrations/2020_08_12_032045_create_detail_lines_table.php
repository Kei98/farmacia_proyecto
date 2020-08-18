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
            $table->string("drug_name", 40);
            $table->double("drug_price");
            $table->double("amount");
            $table->double("subtotal");
            $table->foreignId("id_sale")->references("id")->on("sales");
            $table->foreignId("id_drug")->references("id")->on("drugs");
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
