<?php
$kata = "";
$hasil = "";
$error = "";

if (isset($_POST['submit'])) {

    $kata = $_POST['kata'];

    if (empty($kata)) {

        $error = "Input tidak boleh kosong";
    }

    elseif (!ctype_alpha($kata)) {

        $error = "Input hanya boleh berupa huruf";
    }

    else {

        $panjang = strlen($kata);

        $i = 0;

        while ($i < $panjang) {

            $huruf = $kata[$i];

            $hasil .= strtoupper($huruf);

            $j = 1;

            while ($j < $panjang) {

                $hasil .= strtolower($huruf);

                $j++;
            }

            $i++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>PRAK305</title>

    <style>

        body {
            font-family: Times New Roman;
        }

        input[type="text"] {
            width: 300px;
            height: 30px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .hasil {
            margin-top: 20px;
            font-size: 25px;
        }

    </style>

</head>

<body>

<form method="post">

    <input type="text"
    name="kata"
    value="<?php echo $kata; ?>">

    <button type="submit"
    name="submit">

        Submit

    </button>

</form>

<?php

if (!empty($error)) {

    echo "<div class='error'>$error</div>";
}

?>

<?php if (!empty($hasil)) : ?>

<div class="hasil">

<b>Input:</b>

<br><br>

<?php echo $kata; ?>

<br><br>

<b>Output:</b>

<br><br>

<?php echo $hasil; ?>

</div>

<?php endif; ?>

</body>
</html>