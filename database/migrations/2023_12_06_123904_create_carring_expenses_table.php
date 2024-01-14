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
        Schema::create('carring_expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('gary_number')->nullable();
            $table->string('load_point')->nullable();
            $table->string('delevary_point')->nullable();
            $table->string('driver_name')->nullable();
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
        Schema::dropIfExists('carring_expenses');
    }
};
