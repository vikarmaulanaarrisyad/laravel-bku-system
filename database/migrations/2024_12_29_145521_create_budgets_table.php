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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools');
            $table->year('year');
            $table->bigInteger('initial_balance')->default(0); // Saldo Awal
            $table->bigInteger('bos_disbursement')->default(0); // Dana BOS Masuk
            $table->bigInteger('total_expense')->default(0); // Total Pengeluaran
            $table->bigInteger('final_balance')->default(0); // Saldo Akhir
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
