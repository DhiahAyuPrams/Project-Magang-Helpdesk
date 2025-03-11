<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // Data Default (4 Akun)
        $defaultUsers = [
            [
                'name' => 'Pengguna Level Super Admin',
                'username' => 'SuperAdmin',
                'role' => 'Super Admin',
                'password' => Hash::make('superadmin')
            ],
            [
                'name' => 'Pengguna Level Pimpinan',
                'username' => 'Pimpinan',
                'role' => 'Pimpinan',
                'password' => Hash::make('pimpinan')
            ],
            [
                'name' => 'Pengguna Level Pegawai',
                'username' => 'Pegawai',
                'role' => 'Pegawai',
                'password' => Hash::make('pegawai')
            ],
            [
                'name' => 'Pengguna Level Tim IT',
                'username' => 'TimIT',
                'role' => 'Tim IT',
                'password' => Hash::make('timit')
            ]
        ];

        // Akun Tambahan (10 Akun)
        $additionalUsers = [
            // 4 Tim IT
            ['name' => 'Ahmad Rasyid', 'username' => '198712345678', 'role' => 'Tim IT', 'password' => Hash::make('password123')],
            ['name' => 'Dewi Lestari', 'username' => '198812345679', 'role' => 'Tim IT', 'password' => Hash::make('password123')],
            ['name' => 'Bagus Prasetyo', 'username' => '198912345680', 'role' => 'Tim IT', 'password' => Hash::make('password123')],
            ['name' => 'Siti Aisyah', 'username' => '199012345681', 'role' => 'Tim IT', 'password' => Hash::make('password123')],
            
            // 4 Pegawai
            ['name' => 'Rahmat Hidayat', 'username' => '199112345682', 'role' => 'Pegawai', 'password' => Hash::make('password123')],
            ['name' => 'Nina Amelia', 'username' => '199212345683', 'role' => 'Pegawai', 'password' => Hash::make('password123')],
            ['name' => 'Budi Santoso', 'username' => '199312345684', 'role' => 'Pegawai', 'password' => Hash::make('password123')],
            ['name' => 'Maya Sari', 'username' => '199412345685', 'role' => 'Pegawai', 'password' => Hash::make('password123')],
            
            // 1 Super Admin tambahan
            ['name' => 'Fadli Rahman', 'username' => '199512345686', 'role' => 'Super Admin', 'password' => Hash::make('password123')],
            
            // 1 Pimpinan tambahan
            ['name' => 'Lestari Widodo', 'username' => '199612345687', 'role' => 'Pimpinan', 'password' => Hash::make('password123')],
        ];

        // Masukkan data ke database
        DB::table('users')->insert(array_merge($defaultUsers, $additionalUsers));
    }
}
