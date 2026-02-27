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
        Schema::create('tb_comidas', function (Blueprint $table) {
            $table->id('id_comida');
            $table->string('nombre_comida');
            $table->decimal('costo', 10, 2);
            $table->string('detalle_comida');
           
            $table->foreignId('id_tipo_comida')
                ->references('id_tipo_comida')
                ->on('tb_tipo_comida')
                ->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_comidas');
    }
};
