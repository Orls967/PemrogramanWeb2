<?php
$panjang = "";
$lebar = "";
$nilai = "";

$error = "";
$output = "";

if (isset($_POST['cetak'])) {

    $panjang = trim($_POST['panjang']);
    $lebar = trim($_POST['lebar']);
    $nilai = trim($_POST['nilai']);

    if ($panjang === "" || $lebar === "" || $nilai === "") {

        $error = "Semua input harus diisi";
    }

    elseif (!is_numeric($panjang) || !is_numeric($lebar)) {

        $error = "Panjang dan lebar harus berupa angka";
    }

    elseif ($panjang <= 0 || $lebar <= 0) {

        $error = "Panjang dan lebar harus lebih dari 0";
    }

    else {

        $nilai = preg_replace('/\s+/', ' ', $nilai);

        $data = explode(" ", $nilai);

        $valid = true;

        $i = 0;

        while ($i < count($data)) {

            if (!is_numeric($data[$i])) {

                $valid = false;
            }

            $i++;
        }

        if (!$valid) {

            $error = "Semua nilai matriks harus berupa angka";
        }

        elseif (count($data) != ($panjang * $lebar)) {

            $error = "Panjang nilai tidak sesuai dengan ukuran matriks";
        }

        else {

            $index = 0;

            $baris = 1;

            while ($baris <= $panjang) {

                $output .= "<tr>";

                $kolom = 1;

                while ($kolom <= $lebar) {

                    $output .= "<td>" . $data[$index] . "</td>";

                    $index++;
                    $kolom++;
                }

                $output .= "</tr>";

                $baris++;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>PRAK401</title>

    <style>

        body {
            font-family: Times New Roman;
            font-size: 30px;
        }

        input[type="text"] {
            width: 350px;
            height: 30px;
            font-size: 25px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            border: 1px solid black;
            width: 70px;
            height: 70px;
            text-align: center;
            font-size: 35px;
        }

        button {
            margin-top: 5px;
            font-size: 25px;
        }

    </style>

</head>

<body>

<form method="post">

    Panjang :
    <input type="text"
    name="panjang"
    oninput="this.value=this.value.replace(/[^0-9]/g,'')"
    value="<?php echo $panjang; ?>">

    <br><br>

    Lebar :
    <input type="text"
    name="lebar"
    oninput="this.value=this.value.replace(/[^0-9]/g,'')"
    value="<?php echo $lebar; ?>">

    <br><br>

    Nilai :
    <input type="text"
    name="nilai"
    value="<?php echo $nilai; ?>">

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

<?php if (!empty($output)) : ?>

<table>

<?php

echo $output;

?>

</table>

<?php endif; ?>

</body>
</html>