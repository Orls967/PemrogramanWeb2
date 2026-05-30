CREATE DATABASE PRAK501;
USE PRAK501;

CREATE TABLE member (
    id_member INT AUTO_INCREMENT PRIMARY KEY,
    nama_member VARCHAR(250),
    nomor_member VARCHAR(15),
    alamat TEXT,
    tgl_mendaftar DATETIME,
    tgl_terakhir_bayar DATE
);

CREATE TABLE buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul_buku VARCHAR(500),
    penulis VARCHAR(500),
    penerbit VARCHAR(250),
    tahun_terbit INT
);

CREATE TABLE peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_member INT,
    id_buku INT,
    tgl_pinjam DATE,
    tgl_kembali DATE,

    FOREIGN KEY (id_member)
    REFERENCES member(id_member),

    FOREIGN KEY (id_buku)
    REFERENCES buku(id_buku)
);