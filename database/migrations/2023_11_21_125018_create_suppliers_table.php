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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('owner_name')->nullable();
            $table->string('officer_name')->nullable();
            $table->string('dealer_area')->nullable();
            $table->string('dealer_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->string('security')->nullable();
            $table->integer('ledger_page')->nullable();
            $table->string('price_group')->nullable();
            $table->integer('credit_limit')->nullable();
            $table->integer('advance_payment')->nullable();
            $table->integer('previous_due')->nullable();
            $table->string('remarks')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
