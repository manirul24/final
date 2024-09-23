<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
    [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => bcrypt('password123'), // You should use bcrypt for password encryption
        'phone' => '123-456-7890',
        'address' => '123 Main St, New York, NY',
        'role' => 'admin',
    ],
    [
        'name' => 'Jane Smith',
        'email' => 'jane.smith@example.com',
        'password' => bcrypt('password456'),
        'phone' => '987-654-3210',
        'address' => '456 Elm St, Los Angeles, CA',
        'role' => 'customer',
    ],
    [
        'name' => 'Michael Johnson',
        'email' => 'michael.johnson@example.com',
        'password' => bcrypt('password789'),
        'phone' => '555-123-4567',
        'address' => '789 Oak St, Chicago, IL',
        'role' => 'customer',
    ],
    [
        'name' => 'Emily Davis',
        'email' => 'emily.davis@example.com',
        'password' => bcrypt('password321'),
        'phone' => '222-333-4444',
        'address' => '101 Pine St, Houston, TX',
        'role' => 'customer',
    ],
    [
        'name' => 'David Martinez',
        'email' => 'david.martinez@example.com',
        'password' => bcrypt('password654'),
        'phone' => '777-888-9999',
        'address' => '202 Maple St, Miami, FL',
        'role' => 'customer',
    ],
]);

    }
}
