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
        Schema::create('yearly_bonus_counts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->integer('ton_101')->nullable();
            $table->integer('ton_120')->nullable();
            $table->integer('ton_101_to_ton_120_rate')->nullable();
            $table->integer('ton_121')->nullable();
            $table->integer('ton_130')->nullable();
            $table->integer('ton_121_to_ton_130_rate')->nullable();
            $table->integer('ton_131')->nullable();
            $table->integer('ton_140')->nullable();
            $table->integer('ton_131_to_ton_140_rate')->nullable();
            $table->integer('ton_141')->nullable();
            $table->integer('ton_150')->nullable();
            $table->integer('ton_141_to_ton_150_rate')->nullable();
            $table->integer('ton_151')->nullable();
            $table->integer('ton_160')->nullable();
            $table->integer('ton_151_to_ton_160_rate')->nullable();
            $table->integer('ton_161')->nullable();
            $table->integer('ton_170')->nullable();
            $table->integer('ton_161_to_ton_170_rate')->nullable();
            $table->integer('ton_171')->nullable();
            $table->integer('ton_180')->nullable();
            $table->integer('ton_171_to_ton_180_rate')->nullable();
            $table->integer('ton_181')->nullable();
            $table->integer('ton_190')->nullable();
            $table->integer('ton_181_to_ton_190_rate')->nullable();
            $table->integer('ton_191')->nullable();
            $table->integer('ton_200')->nullable();
            $table->integer('ton_191_to_ton_200_rate')->nullable();
            $table->integer('ton_201')->nullable();
            $table->integer('ton_210')->nullable();
            $table->integer('ton_201_to_ton_210_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yearly_bonus_counts');
    }
};
