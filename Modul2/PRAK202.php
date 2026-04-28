<?php
$nama = "";
$nim = "";
$jk = "";

$error_nama = "";
$error_nim = "";
$error_jk = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jk = isset($_POST['jk']) ? $_POST['jk'] : "";

    // Validasi
    if (empty($nama)) {
        $error_nama = "* nama tidak boleh kosong";
    }

    if (empty($nim)) {
        $error_nim = "* nim tidak boleh kosong";
    }

    if (empty($jk)) {
        $error_jk = "* jenis kelamin tidak boleh kosong";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK202</title>
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
            font-size: 14px;
            margin-left: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<form method="post">
    <div class="form-group">
        Nama:
        <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error">*</span>
        <span class="error"><?php echo $error_nama; ?></span>
    </div>

    <div class="form-group">
        Nim:
        <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error">*</span>
        <span class="error"><?php echo $error_nim; ?></span>
    </div>

    <div class="form-group">
        Jenis Kelamin:
        <span class="error">*</span>
        <span class="error"><?php echo $error_jk; ?></span><br>

        <input type="radio" name="jk" value="Laki-laki"
        <?php if ($jk == "Laki-laki") echo "checked"; ?>> Laki-Laki<br>

        <input type="radio" name="jk" value="Perempuan"
        <?php if ($jk == "Perempuan") echo "checked"; ?>> Perempuan
    </div>

    <button type="submit" name="submit">Submit</button>
</form>

<br>

<?php
// Jika semua valid, tampilkan output
if (isset($_POST['submit']) && empty($error_nama) && empty($error_nim) && empty($error_jk)) {
    echo "<b>Output:</b><br><br>";
    echo $nama . "<br>";
    echo $nim . "<br>";
    echo $jk;
}
?>

</body>
</html>