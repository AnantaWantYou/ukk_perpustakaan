<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul' => 'bulan',
            'slug' => Str::slug('bulan'),
            'sampul' => 'buku/bulan.jpg',
            'penulis' => 'tere Liye',
            'penerbit_id' => 2,
            'kategori_id' => 2,
            'rak_id' => 2,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'bumi',
            'slug' => Str::slug('bumi'),
            'sampul' => 'buku/bumi.jpg',
            'penulis' => 'tere Liye',
            'penerbit_id' => 3,
            'kategori_id' => 2,
            'rak_id' => 3,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'Silly Gilly Daily',
            'slug' => Str::slug('silli-gilly-dailly'),
            'sampul' => 'buku/g1.jpg',
            'penulis' => 'Naela Ali',
            'penerbit_id' => 4,
            'kategori_id' => 2,
            'rak_id' => 4,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'Everyday is a Sunny Day',
            'slug' => Str::slug('everyday'),
            'sampul' => 'buku/g3.jpg',
            'penulis' => 'Bae Sung Tay',
            'penerbit_id' => 5,
            'kategori_id' => 6,
            'rak_id' => 5,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'Sapiens Grafis',
            'slug' => Str::slug('sapiens'),
            'sampul' => 'buku/g4.jpg',
            'penulis' => 'Yuval Noah',
            'penerbit_id' => 5,
            'kategori_id' => 5,
            'rak_id' => 6,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'Dreams Are Made',
            'slug' => Str::slug('dreams'),
            'sampul' => 'buku/g5.jpg',
            'penulis' => 'Naela Ali',
            'penerbit_id' => 3,
            'kategori_id' => 6,
            'rak_id' => 7,
            'stok' => 15
        ]);

        Buku::create([
            'judul' => 'Jalan Bercabang Dua',
            'slug' => Str::slug('jalan'),
            'sampul' => 'buku/g6.jpg',
            'penulis' => 'Puthut EA',
            'penerbit_id' => 5,
            'kategori_id' => 2,
            'rak_id' => 8,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Daily Dose Of Light ',
            'slug' => Str::slug('daily'),
            'sampul' => 'buku/g7.jpg',
            'penulis' => 'Ahmad Fuadi',
            'penerbit_id' => 5,
            'kategori_id' => 5,
            'rak_id' => 9,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Daily Dose Of Shine ',
            'slug' => Str::slug('daily-shine'),
            'sampul' => 'buku/g8.jpg',
            'penulis' => 'Ahmad Fuadi',
            'penerbit_id' => 5,
            'kategori_id' => 5,
            'rak_id' => 10,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Love Book',
            'slug' => Str::slug('daily-shine'),
            'sampul' => 'buku/g9.jpg',
            'penulis' => 'Puung',
            'penerbit_id' => 3,
            'kategori_id' => 4,
            'rak_id' => 11,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Things & Thoughts',
            'slug' => Str::slug('things'),
            'sampul' => 'buku/g10.jpg',
            'penulis' => 'Naela Ali',
            'penerbit_id' => 3,
            'kategori_id' => 4,
            'rak_id' => 12,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Stories for Rainy Days',
            'slug' => Str::slug('story'),
            'sampul' => 'buku/g11.jpg',
            'penulis' => 'Naela Ali',
            'penerbit_id' => 2,
            'kategori_id' => 4,
            'rak_id' => 13,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Dragon Ball',
            'slug' => Str::slug('dragon'),
            'sampul' => 'buku/k1.jpg',
            'penulis' => 'Akira Toriyama',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 14,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Inuyasha',
            'slug' => Str::slug('inuyasha'),
            'sampul' => 'buku/k2.jpg',
            'penulis' => 'Rumiko Takahashi',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 15,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Naruto',
            'slug' => Str::slug('naruto'),
            'sampul' => 'buku/k3.jpg',
            'penulis' => 'Masashi Kishimoto',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 17,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Fullmetal Alchemist',
            'slug' => Str::slug('fullmetal'),
            'sampul' => 'buku/k4.jpg',
            'penulis' => 'Hiromuo Arakawa',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 18,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Death Note',
            'slug' => Str::slug('death'),
            'sampul' => 'buku/k5.jpg',
            'penulis' => 'Hiromuo Arakawok',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 19,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Attack on Titan',
            'slug' => Str::slug('attack'),
            'sampul' => 'buku/k6.jpg',
            'penulis' => 'Hajime Isayama',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 20,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Haikyuu!',
            'slug' => Str::slug('haikyu'),
            'sampul' => 'buku/k7.jpg',
            'penulis' => 'Haruichi Furudate',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 21,
            'stok' => 14
        ]);

        Buku::create([
            'judul' => 'Monster',
            'slug' => Str::slug('monster'),
            'sampul' => 'buku/k8.jpg',
            'penulis' => 'Naoki Urasawa',
            'penerbit_id' => 4,
            'kategori_id' => 6,
            'rak_id' => 21,
            'stok' => 14
        ]);


    }
}
