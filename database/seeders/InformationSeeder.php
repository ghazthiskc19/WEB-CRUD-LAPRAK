<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['list_informasi' => 'Selamat datang di panel informasi admin.'],
            ['list_informasi' => 'Gunakan menu create untuk menambah data baru.'],
            ['list_informasi' => 'Menu edit dipakai untuk memperbarui isi informasi.'],
            ['list_informasi' => 'Menu hapus akan menghapus data secara permanen.'],
            ['list_informasi' => 'Pastikan data yang diinput minimal 3 karakter.'],
        ];

        foreach ($items as $item) {
            Information::updateOrCreate(
                ['list_informasi' => $item['list_informasi']],
                $item
            );
        }
    }
}