<?php
$tinggi = "";
$gambar = "";
$error = "";
$output = "";

if (isset($_POST['cetak'])) {

    $tinggi = $_POST['tinggi'];
    $gambar = $_POST['gambar'];

    if ($tinggi === "") {
        $error = "Tinggi segitiga tidak boleh kosong";
    }

    elseif (!is_numeric($tinggi)) {
        $error = "Tinggi harus berupa angka";
    }

    elseif ($tinggi <= 0) {
        $error = "Tinggi harus lebih dari 0";
    }

    elseif (empty($gambar)) {
        $error = "Alamat gambar tidak boleh kosong";
    }

    else {

        $i = $tinggi;

        while ($i >= 1) {

            $geser = ($tinggi - $i) * 50;

            $output .= "<div style='margin-left: {$geser}px;'>";

            $j = 1;

            while ($j <= $i) {

                $output .= "<img src='$gambar' width='50' height='50'>";

                $j++;
            }

            $output .= "</div>";

            $i--;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK302</title>

    <style>

        body {
            font-family: Times New Roman;
        }

        input[type="text"] {
            height: 28px;
        }

        .tinggi {
            width: 300px;
        }

        .gambar {
            width: 500px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .hasil {
            margin-top: 20px;
        }

    </style>

</head>

<body>

<form method="post">

    Tinggi :
    <input type="text" name="tinggi"
    class="tinggi"
    value="<?php echo $tinggi; ?>">

    <br><br>

    Alamat Gambar :
    <input type="text" name="gambar"
    class="gambar"
    value="<?php echo $gambar; ?>">

    <br><br>

    <button type="submit" name="cetak">
        Cetak
    </button>

</form>

<?php

if (!empty($error)) {

    echo "<div class='error'>$error</div>";
}

?>

<div class="hasil">

<?php

echo $output;

?>

</div>

</body>
</html>