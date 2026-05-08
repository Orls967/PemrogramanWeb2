<?php
$bawah = "";
$atas = "";
$gambar = "https://pngimg.com/uploads/star/star_PNG41474.png";

$error = "";
$output = "";

if (isset($_POST['cetak'])) {

    $bawah = $_POST['bawah'];
    $atas = $_POST['atas'];

    if ($bawah === "" || $atas === "") {

        $error = "Batas bawah dan batas atas tidak boleh kosong";
    }

    elseif (!is_numeric($bawah) || !is_numeric($atas)) {

        $error = "Input harus berupa angka";
    }

    elseif ($bawah > $atas) {

        $error = "Batas bawah tidak boleh lebih besar dari batas atas";
    }

    else {

        $i = $bawah;

        do {

            if (($i + 7) % 5 == 0) {

                $output .= "<img src='$gambar' width='30' height='30'>";
            }

            else {

                $output .= $i . " ";
            }

            $i++;

        } while ($i <= $atas);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>PRAK303</title>

    <style>

        body {
            font-family: Times New Roman;
        }

        input[type="text"] {
            width: 250px;
            height: 28px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .hasil {
            margin-top: 20px;
            font-size: 28px;
        }

        img {
            vertical-align: middle;
        }

    </style>

</head>

<body>

<form method="post">

    Batas Bawah :
    <input type="text"
    name="bawah"
    value="<?php echo $bawah; ?>">

    <br><br>

    Batas Atas :
    <input type="text"
    name="atas"
    value="<?php echo $atas; ?>">

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