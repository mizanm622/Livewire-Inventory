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
            $table->unsignedBigInteger('supplier_id');
            $table->integer('total')->nullable();
            $table->integer('after_discount')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->string('reference_no')->nullable();
            $table->integer('total_quantity')->nullable();
            $table->string('other_charge')->nullable();
            $table->integer('percent_discount')->nullable();
            $table->integer('fix_discount')->nullable();
            $table->string('status')->nullable();
            $table->date('date')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('account')->nullable();
            $table->string('payment_note')->nullable();
            $table->string('note')->nullable();
            $table->softDeletes();
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
