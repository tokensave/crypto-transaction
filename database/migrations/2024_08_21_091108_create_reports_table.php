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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date')->comment('Дата отчета');

            $table->string('usdt_count')->nullable()->comment('Остаток активов в USDT');
            $table->string('btc_count')->nullable()->comment('Остаток активов в BTC');
            $table->string('eth_count')->nullable()->comment('Остаток активов в ETH');
            $table->string('garantex_count')->nullable()->comment('Остаток активов в RUB(GARANTEX)');

            $table->string('remainder_capital')->nullable()->comment('Остаток капитала');
            $table->string('profit')->nullable()->comment('Прибыль');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
