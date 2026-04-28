<?php
$nilai = "";
$hasil = "";

if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];

    if ($nilai === "") {
        $hasil = "";
    } elseif ($nilai < 0 || $nilai >= 1000) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    } elseif ($nilai == 100) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    } elseif ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai < 10) {
        $hasil = "Satuan";
    } elseif ($nilai < 20) {
        $hasil = "Belasan";
    } elseif ($nilai < 100) {
        $hasil = "Puluhan";
    } else {
        $hasil = "Ratusan";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK204</title>
    <style>
        body {
            font-family: Times New Roman;
        }

        input[type="text"] {
            width: 200px;
            height: 30px;
        }

        .hasil {
            margin-top: 15px;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<form method="post">
    Nilai :
    <input type="text" name="nilai" value="<?php echo $nilai; ?>">
    <br><br>

    <button type="submit" name="konversi">Konversi</button>
</form>

<?php if ($hasil !== ""): ?>
    <div class="hasil">
        Hasil: <?php echo strtolower($hasil); ?>
    </div>
<?php endif; ?>

</body>
</html>