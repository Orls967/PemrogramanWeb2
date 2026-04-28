<?php
$nilai = "";
$dari = "";
$ke = "";
$hasil = "";
$satuan = "";

if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    if (!empty($nilai) && !empty($dari) && !empty($ke)) {

        if ($dari == "C") {
            $celcius = $nilai;
        } elseif ($dari == "F") {
            $celcius = ($nilai - 32) * 5/9;
        } elseif ($dari == "R") {
            $celcius = $nilai * 5/4;
        } elseif ($dari == "K") {
            $celcius = $nilai - 273.15;
        }

        if ($ke == "C") {
            $hasil = $celcius;
            $satuan = "°C";
        } elseif ($ke == "F") {
            $hasil = ($celcius * 9/5) + 32;
            $satuan = "°F";
        } elseif ($ke == "R") {
            $hasil = $celcius * 4/5;
            $satuan = "°R";
        } elseif ($ke == "K") {
            $hasil = $celcius + 273.15;
            $satuan = "K";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK203</title>
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
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<form method="post">
    Nilai : 
    <input type="text" name="nilai" value="<?php echo $nilai; ?>"><br><br>

    Dari : <br>
    <input type="radio" name="dari" value="C" <?php if ($dari=="C") echo "checked"; ?>> Celcius<br>
    <input type="radio" name="dari" value="F" <?php if ($dari=="F") echo "checked"; ?>> Fahrenheit<br>
    <input type="radio" name="dari" value="R" <?php if ($dari=="R") echo "checked"; ?>> Reamur<br>
    <input type="radio" name="dari" value="K" <?php if ($dari=="K") echo "checked"; ?>> Kelvin<br><br>

    Ke : <br>
    <input type="radio" name="ke" value="C" <?php if ($ke=="C") echo "checked"; ?>> Celcius<br>
    <input type="radio" name="ke" value="F" <?php if ($ke=="F") echo "checked"; ?>> Fahrenheit<br>
    <input type="radio" name="ke" value="R" <?php if ($ke=="R") echo "checked"; ?>> Reamur<br>
    <input type="radio" name="ke" value="K" <?php if ($ke=="K") echo "checked"; ?>> Kelvin<br><br>

    <button type="submit" name="konversi">Konversi</button>
</form>

<?php if ($hasil !== ""): ?>
    <div class="hasil">
        Hasil Konversi: <?php echo round($hasil, 1) . " " . $satuan; ?>
    </div>
<?php endif; ?>

</body>
</html>