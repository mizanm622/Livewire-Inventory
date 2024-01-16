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
        Schema::create('price_group_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price_group_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('price_group_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_group_products');
    }
};