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
            $table->date('fecha');
            $table->float('monto_total', 8, 2);
            $table->string('forma_pago'); 

            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('comprobante')->nullable();

            $table->unsignedBigInteger('cliente_id')->nullable();
            //$table->foreign('cliente_id')->references('id')->on('clientes');

            $table->unsignedBigInteger('factura_id')->nullable();
           // $table->foreign('factura_id')->references('id')->on('facturas')->nullable();
                                                            //nullave por si compran sin factura o numero de factura
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
