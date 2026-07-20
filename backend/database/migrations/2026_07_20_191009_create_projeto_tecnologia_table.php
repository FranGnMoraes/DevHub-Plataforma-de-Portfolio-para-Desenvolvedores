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
        Schema::create('projeto_tecnologia', function (Blueprint $table) {
            $table->foreignId('projeto_id')->constrained('projetos')->onDelete('cascade');
            $table->foreignId('tecnologia_id')->constrained('tecnologias')->onDelete('cascade');
            $table->primary(['projeto_id', 'tecnologia_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projeto_tecnologia');
    }
};
