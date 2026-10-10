<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $accounts = [
            ['name' => 'Administrator Sekolah', 'username' => 'admin', 'role' => 'admin', 'is_active' => true],
            ['name' => 'Rina Pratiwi', 'username' => 'rina.pratiwi', 'role' => 'wali_kelas', 'is_active' => true],
            ['name' => 'Kepala Sekolah', 'username' => 'kepsek', 'role' => 'kepala_sekolah', 'is_active' => true],
            ['name' => 'Akun Nonaktif', 'username' => 'nonaktif', 'role' => 'wali_kelas', 'is_active' => false],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['username' => $account['username']],
                $account + ['password' => 'password123'],
            );
        }
    }
}
