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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('report_id')->constrained('reports')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('active')->nullable('false')->comment('Актив');
            $table->string('crypto_exchange')->nullable('false')->comment('Криптобиржа');
            $table->string('action')->nullable('false')->comment('Действие с активом');
            $table->decimal('course',12,2)->nullable('false')->comment('Курс');
            $table->decimal('sum',12,2)->nullable('false')->comment('Сумма');
            $table->string('active_count')->nullable('false')->comment('Подсчет активов');
            $table->string('provider')->nullable('false')->comment('Банк');
            $table->string('deal_id')->nullable('false')->comment('Идентификатор сделки');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
