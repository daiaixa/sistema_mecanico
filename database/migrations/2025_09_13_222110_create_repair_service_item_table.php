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
        Schema::create('repair_service_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_repair_service')->constrained()->onDelete('restrict');
            $table->foreignId('id_product')->constrained()->onDelete('restrict');
            $table->decimal('price', 12, 2);
            $table->decimal('amount', 12, 2);
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_service_item');
    }
};
