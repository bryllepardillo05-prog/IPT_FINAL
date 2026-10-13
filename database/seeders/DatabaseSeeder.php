<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Trainers
        DB::table('trainers')->insert([
            [
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'specialization' => 'Strength & Conditioning',
                'phone' => '09123456789',
                'salary' => 20000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Maria',
                'last_name' => 'Santos',
                'specialization' => 'Yoga & Pilates',
                'phone' => '09187654321',
                'salary' => 18000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2. Seed Members
        DB::table('members')->insert([
            [
                'first_name' => 'Pedro',
                'last_name' => 'Penduko',
                'email' => 'pedro@example.com',
                'phone' => '09112223333',
                'date_of_birth' => '1995-05-12',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Bantay',
                'email' => 'ana@example.com',
                'phone' => '09445556666',
                'date_of_birth' => '1998-10-20',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Seed Memberships
        DB::table('memberships')->insert([
            [
                'member_id' => 1,
                'type' => 'Monthly',
                'price' => 1500.00,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonth(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => 2,
                'type' => 'Annual',
                'price' => 15000.00,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
