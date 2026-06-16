<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'nama_member' => 'Andi Saputra',
                'nomor_member' => 'MBR001',
                'alamat' => 'Jl. Merdeka No. 10, Banjarmasin',
                'tgl_mendaftar' => '2024-01-15 08:30:00',
                'tgl_terakhir_bayar' => '2024-06-15',
            ],
            [
                'nama_member' => 'Rina Marlina',
                'nomor_member' => 'MBR002',
                'alamat' => 'Jl. Sudirman No. 25, Banjarmasin',
                'tgl_mendaftar' => '2024-02-10 09:00:00',
                'tgl_terakhir_bayar' => '2024-07-10',
            ],
            [
                'nama_member' => 'Budi Waluyo',
                'nomor_member' => 'MBR003',
                'alamat' => 'Jl. Ahmad Yani No. 88, Banjarbaru',
                'tgl_mendaftar' => '2024-02-20 10:15:00',
                'tgl_terakhir_bayar' => '2024-08-20',
            ],
            [
                'nama_member' => 'Fitri Kusuma',
                'nomor_member' => 'MBR004',
                'alamat' => 'Jl. Gatot Subroto No. 5, Banjarmasin',
                'tgl_mendaftar' => '2024-03-05 14:00:00',
                'tgl_terakhir_bayar' => '2024-09-05',
            ],
            [
                'nama_member' => 'Dimas Prasetyo',
                'nomor_member' => 'MBR005',
                'alamat' => 'Jl. Veteran No. 33, Martapura',
                'tgl_mendaftar' => '2024-03-18 11:30:00',
                'tgl_terakhir_bayar' => '2024-09-18',
            ],
            [
                'nama_member' => 'Siti Nurhaliza',
                'nomor_member' => 'MBR006',
                'alamat' => 'Jl. Pangeran Antasari No. 12, Banjarmasin',
                'tgl_mendaftar' => '2024-04-01 08:45:00',
                'tgl_terakhir_bayar' => '2024-10-01',
            ],
            [
                'nama_member' => 'Rizky Firmansyah',
                'nomor_member' => 'MBR007',
                'alamat' => 'Jl. Lambung Mangkurat No. 7, Banjarmasin',
                'tgl_mendaftar' => '2024-04-22 13:20:00',
                'tgl_terakhir_bayar' => '2024-10-22',
            ],
            [
                'nama_member' => 'Dewi Lestari',
                'nomor_member' => 'MBR008',
                'alamat' => 'Jl. Pramuka No. 45, Banjarbaru',
                'tgl_mendaftar' => '2024-05-10 09:30:00',
                'tgl_terakhir_bayar' => '2024-11-10',
            ],
            [
                'nama_member' => 'Agus Hermawan',
                'nomor_member' => 'MBR009',
                'alamat' => 'Jl. Brigjen H. Hasan Basry No. 19, Banjarmasin',
                'tgl_mendaftar' => '2024-05-28 15:00:00',
                'tgl_terakhir_bayar' => '2024-11-28',
            ],
            [
                'nama_member' => 'Putri Rahayu',
                'nomor_member' => 'MBR010',
                'alamat' => 'Jl. RE Martadinata No. 30, Banjarmasin',
                'tgl_mendaftar' => '2024-06-15 10:45:00',
                'tgl_terakhir_bayar' => '2024-12-15',
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}