<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sobrenome', 100)->after('name');
            $table->string('foto')->nullable()->after('password');
            $table->text('bio')->nullable();
            $table->string('github', 150)->nullable();
            $table->string('linkedin', 150)->nullable();
            $table->string('website', 150)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('rua', 150)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('estado', 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['sobrenome', 'foto', 'bio', 'github', 'linkedin', 'website', 'cep', 'rua', 'bairro', 'cidade', 'estado']);
        });
    }
};