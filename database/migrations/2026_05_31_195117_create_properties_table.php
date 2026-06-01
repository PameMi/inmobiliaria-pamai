<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image'); // Guardará la ruta de la imagen
        $table->decimal('price', 12, 2);
        $table->string('status')->default('En Venta'); // 'En Venta', 'Rentado', 'Vendido'
        $table->string('type'); // 'Casa' o 'Departamento'
        $table->string('location');
        $table->integer('size'); // m2
        $table->text('description'); // Habitaciones, baños, etc.
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
