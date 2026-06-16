<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $loans = [
            ['member_id' => 1, 'book_id' => 1, 'tanggal_pinjam' => '2024-06-01', 'tanggal_kembali' => '2024-06-14'],
            ['member_id' => 2, 'book_id' => 3, 'tanggal_pinjam' => '2024-06-05', 'tanggal_kembali' => '2024-06-19'],
            ['member_id' => 3, 'book_id' => 5, 'tanggal_pinjam' => '2024-06-08', 'tanggal_kembali' => '2024-06-22'],
            ['member_id' => 4, 'book_id' => 2, 'tanggal_pinjam' => '2024-06-10', 'tanggal_kembali' => '2024-06-24'],
            ['member_id' => 5, 'book_id' => 7, 'tanggal_pinjam' => '2024-06-12', 'tanggal_kembali' => '2024-06-26'],
            ['member_id' => 6, 'book_id' => 4, 'tanggal_pinjam' => '2024-06-15', 'tanggal_kembali' => '2024-06-29'],
            ['member_id' => 7, 'book_id' => 8, 'tanggal_pinjam' => '2024-06-18', 'tanggal_kembali' => '2024-07-02'],
            ['member_id' => 8, 'book_id' => 6, 'tanggal_pinjam' => '2024-06-20', 'tanggal_kembali' => '2024-07-04'],
            ['member_id' => 9, 'book_id' => 10, 'tanggal_pinjam' => '2024-06-22', 'tanggal_kembali' => '2024-07-06'],
            ['member_id' => 10, 'book_id' => 9, 'tanggal_pinjam' => '2024-06-25', 'tanggal_kembali' => '2024-07-09'],
        ];

        foreach ($loans as $loan) {
            Loan::create($loan);
        }
    }
}