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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('cliente_id'); 
            $table->timestamp('fecha_pedido'); 
            $table->decimal('total_pedido', 8, 2); 
            $table->text('detalles_pedido');
            $table->enum('estado', ['pendiente', 'preparando', 'entregado', 'cancelado']);
            $table->foreign('cliente_id')->references('id')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
