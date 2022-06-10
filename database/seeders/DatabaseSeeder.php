<?php

namespace Database\Seeders;

use App\Models\InfoKegiatan;
use App\Models\User;
use App\Models\Materi;
use App\Models\Latihan;
use App\Models\Pedoman;
use App\Models\Kategori;
use App\Models\JenisLatihan;
use Illuminate\Database\Seeder;
use Database\Seeders\AuthSeeder;
use Database\Seeders\AuthPembinaSeed;
use Database\Seeders\AuthSuperAdminSeed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // User::create([
        //         'name' => 'Admin Sayu',
        //         'username' => 'adminsayu',
        //         'email' => 'adminsayu@gmail.com',
        //         'password' => bcrypt('password')
        //     ]);

        // User::factory(3)->create();

        Kategori::create([
            'name' => 'Theory Scouts',
            'slug' => 'theory-scouts'
        ]);

        Kategori::create([
            'name' => 'Basic Knowledge of Scouting',
            'slug' => 'basic-knowledge-of-scouting'
        ]);

        Kategori::create([
            'name' => 'Scout Guide',
            'slug' => 'scout-guide'
        ]);

        Kategori::create([
            'name' => 'Scouting-Practise',
            'slug' => 'scouting-practise'
        ]);

        Kategori::create([
            'name' => 'Camp',
            'slug' => 'camp'
        ]);

        Materi::factory(20) -> create();
        Latihan::factory(10) -> create();

        Pedoman::create([
            'judul' => 'SKU Siaga',
            'slug' => 'sku-siaga',
            'deskripsi' => ' SKU ini berisi tentang panduan-panduan untuk menjadi pramuka siaga',
            'detail' => 'Diisi dengan pembina sekolah'
        ]);

        Pedoman::create([
            'judul' => 'SKU Penggalang',
            'slug' => 'sku-penggalang',
            'deskripsi' => ' SKU ini berisi tentang panduan-panduan untuk menjadi pramuka penggalang',
            'detail' => 'Diisi dengan pembina sekolah'
        ]);

        Pedoman::create([
            'judul' => 'SKU Penegak',
            'slug' => 'sku-penegak',
            'deskripsi' => ' SKU ini berisi tentang panduan-panduan untuk menjadi pramuka Penegak',
            'detail' => 'Diisi dengan pembina sekolah'
        ]);

        InfoKegiatan::create([
            'judul' => 'Kegiatan hari jumat di SMA 1 Indramayu',
            'slug' => 'kegiatan-smansayu',
            'deskripsi' => 'kegiatan ini memperingati hari lahirnya boden powell',
            'informasi' => 'mengadakan perlombaan blalalalala'
        ]);

       
        $this->call([
            AuthSeeder::class,
            AuthPembinaSeed::class,
            AuthSuperAdminSeed::class
        ]);

        JenisLatihan::create([
            'jenis' => 'Latihan Tali Menali',
            'slug' => 'latihan-tali-menali'
        ]);

    }
}


