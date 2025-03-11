<?php

namespace Database\Seeders;

use App\Models\TicketSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = ['pending', 'open', 'closed', 'in progress', 'solved'];
        $priorities = ['Urgent', 'High', 'Medium', 'Low'];
        $applications = [
            'INSLOPE (Sistem Manajemen Lereng Jalan)',
            'SMD (Sistem Masukan Data)',
            'SIDAKO-POK'
        ];

        for ($i = 0; $i < 20; $i++) {
            $status = $statuses[array_rand($statuses)];
            $feedback = in_array($status, ['solved', 'closed']) ? 'Terima kasih, masalah sudah terselesaikan.' : null;
            $rating = in_array($status, ['solved', 'closed']) ? rand(1, 5) : null;

            DB::table('ticket')->insert([
                'nama' => 'User ' . ($i + 1),
                'aplikasi' => $applications[array_rand($applications)],
                'subjek' => 'Permasalahan ke-' . ($i + 1),
                'deskripsi' => Str::random(50),
                'prioritas' => $priorities[array_rand($priorities)],
                'agent' => null, // Dikosongkan sesuai permintaan
                'status' => $status,
                'feedback' => $feedback,
                'rating' => $rating,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
