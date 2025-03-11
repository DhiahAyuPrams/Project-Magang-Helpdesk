<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatafaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara mengakses INSLOPE?',
                'answer' => 'Anda dapat mengakses INSLOPE melalui portal resmi atau menggunakan aplikasi mobile yang telah disediakan.',
            ],
            [
                'question' => 'Apa yang harus dilakukan jika tidak bisa login ke SMD?',
                'answer' => 'Pastikan Anda memasukkan username dan password dengan benar. Jika masih bermasalah, silakan reset password atau hubungi tim IT.',
            ],
            [
                'question' => 'Bagaimana cara menambahkan data baru di SIDAKO-POK?',
                'answer' => 'Anda dapat menambahkan data baru dengan masuk ke menu "Input Data" dan mengisi formulir yang tersedia.',
            ],
            [
                'question' => 'Apakah INSLOPE bisa digunakan secara offline?',
                'answer' => 'Saat ini, INSLOPE hanya dapat digunakan secara online untuk memastikan sinkronisasi data yang akurat.',
            ],
            [
                'question' => 'Bagaimana cara melihat laporan di SMD?',
                'answer' => 'Anda dapat melihat laporan dengan masuk ke menu "Laporan", lalu memilih kategori laporan yang ingin ditampilkan.',
            ],
        ];

        foreach ($faqs as $faq) {
            DB::table('faqs')->insert([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
