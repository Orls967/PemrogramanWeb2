<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "PRAK501"
);

if (!$koneksi) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

?>