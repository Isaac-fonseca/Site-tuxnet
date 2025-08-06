<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('cidade');
            $table->date('data_nascimento');
            $table->string('escolaridade');
            // LINHA CORRIGIDA: Agora é apenas um campo numérico.
            $table->unsignedBigInteger('vaga_id');
            $table->string('email');
            $table->string('telefone');
            $table->boolean('possui_cnh')->default(false);
            $table->boolean('vinculo_empregaticio')->default(false);
            $table->string('pretensao_salarial')->nullable();
            $table->json('disponibilidade')->nullable();
            $table->text('motivo');
            $table->string('caminho_curriculo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidaturas');
    }
};
