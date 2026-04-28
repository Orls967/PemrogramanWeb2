<?php
$nama1 = "";
$nama2 = "";
$nama3 = "";
$hasil = [];

if (isset($_POST['urutkan'])) {
    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];
    $nama3 = $_POST['nama3'];

    if ($nama1 > $nama2) {
        $temp = $nama1;
        $nama1 = $nama2;
        $nama2 = $temp;
    }

    if ($nama1 > $nama3) {
        $temp = $nama1;
        $nama1 = $nama3;
        $nama3 = $temp;
    }

    if ($nama2 > $nama3) {
        $temp = $nama2;
        $nama2 = $nama3;
        $nama3 = $temp;
    }

    $hasil = [$nama1, $nama2, $nama3];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK201</title>
</head>
<body>

<form method="post">
    Nama: 1<input type="text" name="nama1" value="<?php echo $nama1; ?>"><br><br>
    Nama: 2<input type="text" name="nama2" value="<?php echo $nama2; ?>"><br><br>
    Nama: 3<input type="text" name="nama3" value="<?php echo $nama3; ?>"><br><br>

    <button type="submit" name="urutkan">Urutkan</button>
</form>

<br>

<?php if (!empty($hasil)): ?>
    <?php foreach ($hasil as $n): ?>
        <?php echo $n . "<br>"; ?>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>