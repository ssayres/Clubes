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
    Schema::create('clubes', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('categoria');
        $table->text('descricao')->nullable();
        $table->decimal('preco', 8, 2);
        $table->enum('periodicidade', ['mensal', 'trimestral', 'anual']);
        $table->unsignedBigInteger('user_id'); // Criador do clube
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubes');
    }
};
