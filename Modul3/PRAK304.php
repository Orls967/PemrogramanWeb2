<?php
$jumlah = "";
$error = "";

$gambar = "https://pngimg.com/uploads/star/star_PNG41474.png";

if (isset($_POST['submit'])) {

    $jumlah = $_POST['jumlah'];

    if ($jumlah === "") {

        $error = "Jumlah bintang tidak boleh kosong";
    }

    elseif (!is_numeric($jumlah)) {

        $error = "Jumlah bintang harus berupa angka";
    }

    elseif ($jumlah <= 0) {

        $error = "Jumlah bintang harus lebih dari 0";
    }
}

if (isset($_POST['tambah'])) {

    $jumlah = $_POST['jumlah_hidden'];

    if (!is_numeric($jumlah)) {

        $error = "Jumlah bintang harus berupa angka";
    }

    else {

        $jumlah++;
    }
}

if (isset($_POST['kurang'])) {

    $jumlah = $_POST['jumlah_hidden'];

    if (!is_numeric($jumlah)) {

        $error = "Jumlah bintang harus berupa angka";
    }

    elseif ($jumlah <= 1) {

        $error = "Jumlah bintang tidak boleh kurang dari 1";
    }

    else {

        $jumlah--;
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>PRAK304</title>

    <style>

        body {
            font-family: Times New Roman;
        }

        input[type="text"] {
            width: 250px;
            height: 30px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .hasil {
            margin-top: 20px;
        }

        img {
            width: 80px;
            height: 80px;
        }

    </style>

</head>

<body>

<form method="post">

    Jumlah bintang
    <input type="text"
    name="jumlah"
    value="<?php echo $jumlah; ?>">

    <br><br>

    <button type="submit" name="submit">
        Submit
    </button>

</form>

<?php

if (!empty($error)) {

    echo "<div class='error'>$error</div>";
}

?>

<?php if ($jumlah !== "" && is_numeric($jumlah) && $jumlah > 0) : ?>

<div class="hasil">

<?php

echo "Jumlah bintang " . $jumlah . "<br><br>";

$i = 1;

while ($i <= $jumlah) {

    echo "<img src='$gambar'>";

    $i++;
}

?>

<form method="post">

    <input type="hidden"
    name="jumlah_hidden"
    value="<?php echo $jumlah; ?>">

    <br>

    <button type="submit" name="tambah">
        Tambah
    </button>

    <button type="submit" name="kurang">
        Kurang
    </button>

</form>

</div>

<?php endif; ?>

</body>
</html>