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
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // BIGINT with auto-increment
            $table->string('name'); // STRING for the car name
            $table->string('brand'); // STRING for the car brand
            $table->string('model'); // STRING for the car model
            $table->integer('year'); // INTEGER for the year of manufacture
            $table->string('car_type'); // STRING for the car type (e.g., sedan, SUV, etc.)
            $table->decimal('daily_rent_price', 8, 2); // DECIMAL for daily rent price with 8 digits and 2 decimal places
            $table->enum('availability',['Unavailable', 'Available'])->default('Available'); // BOOLEAN for car availability status
            $table->string('car_image')->nullable(); // STRING for image path, can be null
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
