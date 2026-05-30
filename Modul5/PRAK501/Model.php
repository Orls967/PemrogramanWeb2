<?php

require 'Koneksi.php';


function getAllBuku()
{
    global $koneksi;

    $query = mysqli_query($koneksi, "SELECT * FROM buku");

    return $query;
}

function getBukuById($id)
{
    global $koneksi;

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM buku WHERE id_buku = '$id'"
    );

    return mysqli_fetch_assoc($query);
}

function insertBuku($judul, $penulis, $penerbit, $tahun)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "INSERT INTO buku
        VALUES (
            NULL,
            '$judul',
            '$penulis',
            '$penerbit',
            '$tahun'
        )"
    );
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "UPDATE buku
        SET
            judul_buku = '$judul',
            penulis = '$penulis',
            penerbit = '$penerbit',
            tahun_terbit = '$tahun'
        WHERE id_buku = '$id'"
    );
}

function deleteBuku($id)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "DELETE FROM buku
        WHERE id_buku = '$id'"
    );
}

function getAllMember()
{
    global $koneksi;

    return mysqli_query(
        $koneksi,
        "SELECT * FROM member"
    );
}

function getMemberById($id)
{
    global $koneksi;

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM member
        WHERE id_member = '$id'"
    );

    return mysqli_fetch_assoc($query);
}

function insertMember(
    $nama,
    $nomor,
    $alamat,
    $tgl_daftar,
    $tgl_bayar
)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "INSERT INTO member
        VALUES (
            NULL,
            '$nama',
            '$nomor',
            '$alamat',
            '$tgl_daftar',
            '$tgl_bayar'
        )"
    );
}

function updateMember(
    $id,
    $nama,
    $nomor,
    $alamat,
    $tgl_daftar,
    $tgl_bayar
)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "UPDATE member
        SET
            nama_member = '$nama',
            nomor_member = '$nomor',
            alamat = '$alamat',
            tgl_mendaftar = '$tgl_daftar',
            tgl_terakhir_bayar = '$tgl_bayar'
        WHERE id_member = '$id'"
    );
}

function deleteMember($id)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "DELETE FROM member
        WHERE id_member = '$id'"
    );
}

function getAllPeminjaman()
{
    global $koneksi;

    return mysqli_query(
        $koneksi,
        "SELECT *
        FROM peminjaman
        INNER JOIN member
        ON peminjaman.id_member = member.id_member
        INNER JOIN buku
        ON peminjaman.id_buku = buku.id_buku"
    );
}

function getPeminjamanById($id)
{
    global $koneksi;

    $query = mysqli_query(
        $koneksi,
        "SELECT *
        FROM peminjaman
        WHERE id_peminjaman = '$id'"
    );

    return mysqli_fetch_assoc($query);
}

function insertPeminjaman(
    $id_member,
    $id_buku,
    $tgl_pinjam,
    $tgl_kembali
)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "INSERT INTO peminjaman
        VALUES (
            NULL,
            '$id_member',
            '$id_buku',
            '$tgl_pinjam',
            '$tgl_kembali'
        )"
    );
}

function updatePeminjaman(
    $id,
    $id_member,
    $id_buku,
    $tgl_pinjam,
    $tgl_kembali
)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "UPDATE peminjaman
        SET
            id_member = '$id_member',
            id_buku = '$id_buku',
            tgl_pinjam = '$tgl_pinjam',
            tgl_kembali = '$tgl_kembali'
        WHERE id_peminjaman = '$id'"
    );
}

function deletePeminjaman($id)
{
    global $koneksi;

    mysqli_query(
        $koneksi,
        "DELETE FROM peminjaman
        WHERE id_peminjaman = '$id'"
    );
}

?>