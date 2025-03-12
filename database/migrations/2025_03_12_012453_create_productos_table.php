<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('codigo_producto')->unique();
            $table->string('nombre_producto');
            $table->text('descripcion_producto')->nullable();
            $table->text('imagen_producto')->nullable();
            $table->integer('stock_producto');
            $table->integer('stock_min_producto');
            $table->integer('stock_max_producto');
            $table->decimal('precio_oferta_producto',8,2)->nullable();
            $table->decimal('precio_venta_producto',8,2);
            $table->date('fecha_vencimiento_producto');

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');

            $table->unsignedBigInteger('id_marca');
            $table->foreign('id_marca')->references('id')->on('marcas')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
