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
    Schema::create('assinaturas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Usuário que assina
        $table->unsignedBigInteger('clube_id'); // Clube assinado
        $table->enum('status', ['ativa', 'pausada', 'cancelada']);
        $table->date('data_inicio');
        $table->date('data_fim')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('clube_id')->references('id')->on('clubes')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assinaturas');
    }
};
