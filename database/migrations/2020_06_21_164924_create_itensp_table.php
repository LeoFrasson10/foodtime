<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItenspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itensp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("pedidos_id");
            $table->unsignedBigInteger("itens_id");
            $table->integer('quantidade');
            $table->float('preco', 8,2);
            $table->timestamps();
            $table->foreign("pedidos_id")->references("id")->on("pedidos");
            $table->foreign("itens_id")->references("id")->on("itens");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itensp');
    }
}
