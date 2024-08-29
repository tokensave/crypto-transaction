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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('online_at')->nullable();

            $table->string('first_name')->nullable()->comment('Имя');
            $table->string('middle_name')->nullable()->comment('Отчество');
            $table->string('last_name')->nullable()->comment('Фамилия');

            $table->decimal('money_capital', 12, 2)->nullable()->comment('Денежный капитал');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_confirmed_at')->nullable();

            $table->string('password');
            $table->timestamp('password_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
