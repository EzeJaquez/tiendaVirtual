<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('nombre')->unique();
            $table->string('slug')->unique();
            $table->string('descripcion');
            $table->string('imagen')->nullable();
            $table->integer('precio');
            $table->integer('stock');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categoria');
            //$table->foreignId('categoria_id')->constrained('categoria');
        });

        // Schema::table('producto', function (Blueprint $table) {
        //     $table->foreign('categoria_id')->references('id')->on('categoria');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
        // $table->dropForeign('producto_id_categoria_foreign');
        // $table->dropIndex('producto_id_categoria_index');
        // $table->dropColumn('id_categoria');
    }
}
