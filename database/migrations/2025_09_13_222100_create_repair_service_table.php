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
        Schema::create('repair_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_repair')->constrained()->onDelete('restrict');
            $table->foreignId('id_service')->constrained()->onDelete('restrict');
            $table->decimal('total_service_price', 12, 2); //Podria tener algun descuento...
            $table->boolean('discount_applied')->default(false);
            $table->string('discount_type', 10)->nullable(); //Porcentaje o monto fijo
            $table->decimal('discount_value', 12, 2)->nullable(); //Valor del descuento
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_repairs');
    }
};
