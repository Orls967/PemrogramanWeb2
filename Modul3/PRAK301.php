<?php
$jumlah = "";
$error = "";
$output = "";

if (isset($_POST['cetak'])) {

    $jumlah = $_POST['jumlah'];

    if ($jumlah === "") {
        $error = "Jumlah peserta tidak boleh kosong";
    }

    elseif (!is_numeric($jumlah)) {
        $error = "Input harus berupa angka";
    }

    elseif ($jumlah <= 0) {
        $error = "Jumlah peserta harus lebih dari 0";
    }

    else {

        $i = 1;

        while ($i <= $jumlah) {

            if ($i % 2 == 1) {
                $output .= "<p style='color:red; font-size:35px; font-weight:bold;'>
                Peserta ke-$i
                </p>";
            }

            else {
                $output .= "<p style='color:green; font-size:35px; font-weight:bold;'>
                Peserta ke-$i
                </p>";
            }

            $i++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK301</title>

    <style>

        body {
            font-family: Times New Roman;
        }

        input[type="text"] {
            width: 200px;
            height: 28px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        button {
            margin-top: 5px;
        }

    </style>

</head>

<body>

<form method="post">

    Jumlah Peserta :
    <input type="text" name="jumlah"
    value="<?php echo $jumlah; ?>">

    <br>

    <button type="submit" name="cetak">
        Cetak
    </button>

</form>

<?php

if (!empty($error)) {

    echo "<div class='error'>$error</div>";
}

?>

<br>

<?php

echo $output;

?>

</body>
</html>