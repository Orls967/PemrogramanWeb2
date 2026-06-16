<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => 2005,
            ],
            [
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'penerbit' => 'Hasta Mitra',
                'tahun_terbit' => 1980,
            ],
            [
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'penerbit' => 'Kompas',
                'tahun_terbit' => 2019,
            ],
            [
                'judul' => 'Sapiens: Sejarah Singkat Umat Manusia',
                'penulis' => 'Yuval Noah Harari',
                'penerbit' => 'KPG',
                'tahun_terbit' => 2017,
            ],
            [
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2019,
            ],
            [
                'judul' => 'Seni Perang',
                'penulis' => 'Sun Tzu',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2021,
            ],
            [
                'judul' => 'Pulang',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Republika',
                'tahun_terbit' => 2015,
            ],
            [
                'judul' => 'Laut Bercerita',
                'penulis' => 'Leila S. Chudori',
                'penerbit' => 'Kepustakaan Populer Gramedia',
                'tahun_terbit' => 2017,
            ],
            [
                'judul' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2002,
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2009,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}