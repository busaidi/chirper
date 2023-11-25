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
        Schema::create('product_pricing_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_type_id')->constrained('product_types');
            $table->decimal('base_price', 8, 2);
            $table->decimal('color_price', 8, 2)->nullable();
            $table->decimal('crimping_price', 8, 2)->nullable();
            $table->decimal('min_length', 8, 2)->nullable(); // Minimum Length for Applicable Pricing
            $table->decimal('max_length', 8, 2)->nullable(); // Maximum Length for Applicable Pricing
            $table->integer('min_qty')->nullable(); // Minimum Quantity for Applicable Pricing
            $table->integer('max_qty')->nullable(); // Maximum Quantity for Applicable Pricing
            $table->decimal('weight_price', 8, 2)->nullable(); // Price per Kilogram for Weight-Based Pricing
            $table->decimal('weight_per_meter_price', 8, 2)->nullable(); // Price per Kilogram per Meter for Weight per Meter Pricing
            $table->decimal('bar_length_price', 8, 2)->nullable(); // Price per Kilogram per Meter for Bar Length Pricing
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_pricing_rules');
    }
};
