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
        Schema::create('return_supplier_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->integer('purchase_invoice_no')->nullable();
            $table->integer('return_invoice_no')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('return_date')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('product_store_id')->nullable();
            $table->string('transport_no')->nullable();
            $table->string('total_price')->nullable();
            $table->string('total_qty')->nullable();
            $table->integer('old_due')->nullable();
            $table->integer('current_due')->nullable();
            $table->double('advance_payment',20,4)->nullable();
            $table->integer('carring')->nullable();
            $table->integer('other_charge')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_supplier_infos');
    }
};
