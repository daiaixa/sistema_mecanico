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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customer')->constrained()->onDelete('restrict'); //podria ser un cliente distinto al del vehiculo, porque se podria haber vendido
            $table->foreignId('vehicle_id')->constrained()->onDelete('restrict');
            $table->bigInteger('kilometers');
            $table->dateTime('date_repair');
            $table->bigInteger('kilometers_next')->nullable();
            $table->boolean('picked_up')->default(false);
            $table->date('pickup_date')->nullable(); //fecha de retiro
            $table->decimal('total_amount', 10, 2)->default(0); //costo total de la reparacion (porque puede incluir distintos ss)
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
