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
        Schema::create('return_sales_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('return_invoice_no')->nullable();
            $table->integer('product_store_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('purchase_code')->nullable();
            $table->string('product_name')->nullable();
            $table->bigInteger('product_quantity')->nullable();
            $table->bigInteger('product_weight')->nullable();
            $table->integer('product_price')->nullable();
            $table->string('sub_total')->nullable();
            $table->date('return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_sales_products');
    }
};
