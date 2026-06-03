<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Praktikan extends Model
{
    protected $table = 'praktikans';

    protected $fillable = [
        'name', 'nim', 'full_name', 'prodi', 'photo', 'hobbies', 'skills'
    ];

    public function getHobiAttribute()
    {
        if (array_key_exists('hobbies', $this->attributes) && ! is_null($this->attributes['hobbies'])) {
            $val = $this->attributes['hobbies'];
            if (is_string($val)) {
                return array_map('trim', explode(',', $val));
            }
            return $val;
        }
        return [];
    }

    public function getSkillsAttribute()
    {
        if (array_key_exists('skills', $this->attributes) && ! is_null($this->attributes['skills'])) {
            $val = $this->attributes['skills'];
            if (is_string($val)) {
                return array_map('trim', explode(',', $val));
            }
            return $val;
        }

        return [];
    }

    private static $experiences = [
        [
            'id' => 1,
            'title' => 'Opening Efte-Fest 2024 : Acara Pembukaan Festival Fakultas Teknik 2024',
            'time' => '2024-09-07',
            'image' => 'images/pengalaman1.JPG',
            'description' => 'Pada acara pembukaan Efte-Fest 2024 saya berkesempatan untuk bertemu banyak mahasiswa dari berbagai program studi. Kegiatan dimulai dengan sambutan resmi, pertunjukan musik, Saya merasa terbantu untuk memperluas jaringan pertemanan serta mendapatkan perspektif baru dari teman-teman lintas prodi yang memiliki minat dan pengalaman berbeda.',
            'impression' => 'Pengalaman ini memberi saya kesempatan memperluas jaringan, meningkatkan rasa kebersamaan, serta mengasah kemampuan komunikasi antar teman seangkatan dan lintas jurusan.'
        ],
        [
            'id' => 2,
            'title' => 'UAS Project Kewirausahaan : VIRPAL (Virtual Personal AI Assistant)',
            'time' => '2025-06-30',
            'image' => 'images/pengalaman2.JPG',
            'description' => 'Sebagai bagian dari tugas akhir mata kuliah kewirausahaan, kelompok kami mengembangkan VIRPAL, sebuah konsep asisten virtual personal berbasis AI. Prosesnya melibatkan perumusan ide bisnis, identifikasi permasalahan pengguna, analisis pasar, hingga perancangan prototipe dan penyusunan proposal. Menurut saya, projek ini adalah salah satu projek dengan proses yang paling matang dan bisa dikatakan paling berhasil.',
            'impression' => 'Melalui proyek ini saya memperkuat kemampuan berkreasi dan berinovasi, belajar berkolaborasi dalam tim lintas keahlian, meningkatkan keterampilan presentasi, serta memahami proses memecahkan masalah dan menyiapkan ide bisnis dari nol hingga siap dipresentasikan.'
        ],
        [
            'id' => 3,
            'title' => 'Pertandingan Basket Bersama Mahasiswa Teknologi Informasi Angkatan 2024',
            'time' => '2025-10-06',
            'image' => 'images/pengalaman3.JPG',
            'description' => 'Saya mengikuti pertandingan basket yang diselenggarakan oleh Fakultas Teknik. Pertandingan berjalan lancar, walau belum berakhir ke kemenangan, tapi tetap salah satu pengalaman yang berharga, karena kali ini bermain bersama teman-teman yang terhitung baru tapi tetap bisa kompak.',
            'impression' => 'Pengalaman ini mengajarkan pentingnya kerja sama tim, sportivitas, dan mempererat hubungan pertemanan serta kekompakan angkatan.'
        ],
        [
            'id' => 4,
            'title' => 'Penutupan LKMM-TD Bersama Kelompok di Fakultas Teknik Banjarbaru',
            'time' => '2025-05-19',
            'image' => 'images/pengalaman4.JPG',
            'description' => 'Acara penutupan LKMM-TD bersama teman-teman satu kelompok terasa begitu singkat walau dimulai dari sore hari. Anggota-anggota satu kelompok ini sebagian besar merupakan teman-teman yang baru dikenal, tapi masing-masing tetap asik, bahkan sudah sampai beberapa kali kerja kelompok bersama.',
            'impression' => 'Kegiatan ini memperkuat soft skill seperti kepemimpinan dan komunikasi, meningkatkan kemampuan beradaptasi dalam kelompok, serta menjalin relasi yang memperkaya pengalaman perkuliahan.'
        ],
    ];



    public static function experiences()
    {
        return self::$experiences;
    }

    public static function findExperience($id)
    {
        foreach (self::$experiences as $exp) {
            if ($exp['id'] == $id) {
                return $exp;
            }
        }

        return null;
    }
}