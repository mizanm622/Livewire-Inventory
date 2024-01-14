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
        Schema::create('dokan_expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('dokan_rent')->nullable();
            $table->integer('rent_amount')->nullable();
            $table->string('rent_month')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('receiving_by')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokan_expenses');
    }
};
