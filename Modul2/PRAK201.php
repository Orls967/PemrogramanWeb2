<?php
$nama1 = "";
$nama2 = "";
$nama3 = "";
$hasil = [];

if (isset($_POST['urutkan'])) {
    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];
    $nama3 = $_POST['nama3'];

    $a = $nama1;
    $b = $nama2;
    $c = $nama3;

    if ($a > $b) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    if ($a > $c) {
        $temp = $a;
        $a = $c;
        $c = $temp;
    }

    if ($b > $c) {
        $temp = $b;
        $b = $c;
        $c = $temp;
    }

    $hasil = [$a, $b, $c];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK201</title>
</head>
<body>

<form method="post">
    Nama: 1 <input type="text" name="nama1" value="<?php echo $nama1; ?>"><br><br>
    Nama: 2 <input type="text" name="nama2" value="<?php echo $nama2; ?>"><br><br>
    Nama: 3 <input type="text" name="nama3" value="<?php echo $nama3; ?>"><br><br>

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