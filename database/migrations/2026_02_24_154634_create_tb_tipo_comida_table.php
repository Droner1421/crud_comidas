<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_tipo_comida', function (Blueprint $table) {
            $table->id('id_tipo_comida');
            $table->string('nombre_categoria');
            $table->timestamps();
        });

        // Insertar tipos de comida por defecto
        DB::table('tb_tipo_comida')->insert([
            ['nombre_categoria' => 'Bebidas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'Postres', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'Platillos Fuertes', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'Entradas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'Sopas', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tipo_comida');
    }
};
