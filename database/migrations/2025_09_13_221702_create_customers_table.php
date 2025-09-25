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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('document_number')->unique();
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email');
            $table->foreignId('town_id')->constrained()->onDelete('restrict');
            $table->text('observations')->nullable();
            $table->boolean('debtor')->default(false); //deudor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
