<?php

$mahasiswa = [

    [
        "nama" => "Andi",
        "nim" => "2101001",
        "uts" => 87,
        "uas" => 65
    ],

    [
        "nama" => "Budi",
        "nim" => "2101002",
        "uts" => 76,
        "uas" => 79
    ],

    [
        "nama" => "Tono",
        "nim" => "2101003",
        "uts" => 50,
        "uas" => 41
    ],

    [
        "nama" => "Jessica",
        "nim" => "2101004",
        "uts" => 60,
        "uas" => 75
    ]

];

$i = 0;

while ($i < count($mahasiswa)) {

    $uts = $mahasiswa[$i]["uts"];
    $uas = $mahasiswa[$i]["uas"];

    $akhir = ($uts * 0.4) + ($uas * 0.6);

    $mahasiswa[$i]["akhir"] = $akhir;

    if ($akhir >= 80) {

        $huruf = "A";
    }

    elseif ($akhir >= 70) {

        $huruf = "B";
    }

    elseif ($akhir >= 60) {

        $huruf = "C";
    }

    elseif ($akhir >= 50) {

        $huruf = "D";
    }

    else {

        $huruf = "E";
    }

    $mahasiswa[$i]["huruf"] = $huruf;

    $i++;
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>PRAK402</title>

    <style>

        body {
            font-family: Times New Roman;
            font-size: 28px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 1200px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }

    </style>

</head>

<body>

<table>

    <tr>

        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>

    </tr>

<?php

$i = 0;

while ($i < count($mahasiswa)) {

?>

    <tr>

        <td>
            <?php echo $mahasiswa[$i]["nama"]; ?>
        </td>

        <td>
            <?php echo $mahasiswa[$i]["nim"]; ?>
        </td>

        <td>
            <?php echo $mahasiswa[$i]["uts"]; ?>
        </td>

        <td>
            <?php echo $mahasiswa[$i]["uas"]; ?>
        </td>

        <td>
            <?php echo $mahasiswa[$i]["akhir"]; ?>
        </td>

        <td>
            <?php echo $mahasiswa[$i]["huruf"]; ?>
        </td>

    </tr>

<?php

    $i++;
}

?>

</table>

</body>
</html>