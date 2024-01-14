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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->double('previous_due')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->double('current_due')->nullable();
            $table->integer('previous_advance')->nullable();
            $table->integer('current_advance')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('bank_title')->nullable();
            $table->integer('invoice_no')->nullable();
            $table->date('date')->nullable();
            $table->string('purpose')->nullable();
            $table->string('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
