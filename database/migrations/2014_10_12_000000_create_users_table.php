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
       

        Schema::create('users', function (Blueprint $table) {
            $table->id(); // BIGINT with auto-increment
            $table->string('name'); // STRING for the user's name
            $table->string('email')->unique(); // STRING for the email, unique constraint
            $table->string('password'); // STRING for the password
             $table->string('phone',20); // STRING for the password
             $table->string('address'); // STRING for the password
            $table->enum('role', ['admin', 'customer'])->default('customer'); // ENUM for role (admin/customer)
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
