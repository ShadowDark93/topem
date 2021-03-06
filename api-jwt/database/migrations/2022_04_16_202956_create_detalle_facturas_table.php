<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('facturas');
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->double('valor_unitario');
            $table->double('valor_total');
            $table->char('estado',1)->default('1')->nullable();
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
        Schema::dropIfExists('detalle_facturas');
    }
};