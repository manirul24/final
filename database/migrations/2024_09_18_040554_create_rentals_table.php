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
        Schema::create('rentals', function (Blueprint $table) {
            Schema::create('rentals', function (Blueprint $table) {
            $table->id(); // BIGINT with auto-increment
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // BIGINT for user, foreign key to users
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade'); // BIGINT for car, foreign key to cars                
            $table->date('start_date'); // DATE for the rental start date
            $table->date('end_date'); // DATE for the rental end date
            $table->decimal('total_cost', 8, 2); // DECIMAL for total cost with 8 digits and 2 decimal places
             $table->enum('status', ['ongoing', 'completed', 'canceled','Booked'])->default('Booked');  // Status
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
