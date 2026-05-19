<?php

$mahasiswa = [

    [
        "no" => 1,
        "nama" => "Ridho",
        "matkul" => [

            [
                "nama_matkul" => "Pemrograman I",
                "sks" => 2
            ],

            [
                "nama_matkul" => "Praktikum Pemrograman I",
                "sks" => 1
            ],

            [
                "nama_matkul" => "Pengantar Lingkungan Lahan Basah",
                "sks" => 2
            ],

            [
                "nama_matkul" => "Arsitektur Komputer",
                "sks" => 3
            ]
        ]
    ],

    [
        "no" => 2,
        "nama" => "Ratna",
        "matkul" => [

            [
                "nama_matkul" => "Basis Data I",
                "sks" => 2
            ],

            [
                "nama_matkul" => "Praktikum Basis Data I",
                "sks" => 1
            ],

            [
                "nama_matkul" => "Kalkulus",
                "sks" => 3
            ]
        ]
    ],

    [
        "no" => 3,
        "nama" => "Tono",
        "matkul" => [

            [
                "nama_matkul" => "Rekayasa Perangkat Lunak",
                "sks" => 3
            ],

            [
                "nama_matkul" => "Analisis dan Perancangan Sistem",
                "sks" => 3
            ],

            [
                "nama_matkul" => "Komputasi Awan",
                "sks" => 3
            ],

            [
                "nama_matkul" => "Kecerdasan Bisnis",
                "sks" => 3
            ]
        ]
    ]

];

?>

<!DOCTYPE html>
<html>
<head>

    <title>PRAK403</title>

    <style>

        body {
            font-family: Times New Roman;
        }

        table {
            border-collapse: collapse;
            width: 1000px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            vertical-align: top;
        }

        th {
            background-color: #d9d9d9;
        }

        .revisi {
            background-color: red;
            color: white;
            font-weight: bold;
        }

        .tidak-revisi {
            background-color: limegreen;
            color: white;
            font-weight: bold;
        }

    </style>

</head>

<body>

<table>

    <tr>

        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>

    </tr>

<?php

foreach ($mahasiswa as $data) {

    $total_sks = 0;

    foreach ($data['matkul'] as $mk) {

        $total_sks += $mk['sks'];
    }

    if ($total_sks < 7) {

        $keterangan = "Revisi KRS";
        $class = "revisi";
    }

    else {

        $keterangan = "Tidak Revisi";
        $class = "tidak-revisi";
    }

    $jumlah_matkul = count($data['matkul']);

    $pertama = true;

    foreach ($data['matkul'] as $mk) {

        echo "<tr>";

        if ($pertama) {

            echo "<td rowspan='$jumlah_matkul'>" . $data['no'] . "</td>";

            echo "<td rowspan='$jumlah_matkul'>" . $data['nama'] . "</td>";
        }

        echo "<td>" . $mk['nama_matkul'] . "</td>";

        echo "<td>" . $mk['sks'] . "</td>";

        if ($pertama) {

            echo "<td rowspan='$jumlah_matkul'>" . $total_sks . "</td>";

            echo "<td rowspan='$jumlah_matkul' class='$class'>
            $keterangan
            </td>";
        }

        echo "</tr>";

        $pertama = false;
    }
}

?>

</table>

</body>
</html>