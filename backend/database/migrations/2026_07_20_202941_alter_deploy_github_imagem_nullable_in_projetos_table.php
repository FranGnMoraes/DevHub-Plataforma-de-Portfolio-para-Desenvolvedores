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
        Schema::table('projetos', function (Blueprint $table) {
            $table->string('imagem')->nullable()->change();
            $table->string('github')->nullable()->change();
            $table->string('deploy')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('projetos', function (Blueprint $table) {
            $table->string('imagem')->nullable(false)->change();
            $table->string('github')->nullable(false)->change();
            $table->string('deploy')->nullable(false)->change();
        });
    }
};
