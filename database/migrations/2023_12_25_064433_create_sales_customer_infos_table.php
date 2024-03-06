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
        Schema::create('sales_customer_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('invoice_no')->nullable();
            $table->integer('product_store_id')->nullable();
            $table->string('transport_no')->nullable();
            $table->string('total_price')->nullable();
            $table->string('total_qty')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('old_due')->nullable();
            $table->integer('advance_payment')->nullable();
            $table->integer('current_due')->nullable();
            $table->integer('carring')->nullable();
            $table->integer('other_charge')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('bank_title')->nullable();
            $table->integer('payment')->nullable();
            $table->integer('product_discount')->nullable();
            $table->integer('price_discount')->nullable();
            $table->string('delivery_man')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('sales_customer_infos');
    }
};
