<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('active')->nullable('false')->comment('Актив');
            $table->string('crypto_exchange')->nullable('false')->comment('Криптобиржа');
            $table->string('action')->nullable('false')->comment('Действие с активом');
            $table->string('course')->nullable('false')->comment('Курс');
            $table->string('sum')->nullable('false')->comment('Сумма');
            $table->string('provider')->nullable('false')->comment('Банк');
            $table->string('deal_id')->nullable('false')->comment('Идентификатор сделки');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
