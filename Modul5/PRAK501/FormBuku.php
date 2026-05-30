<?php

require 'Model.php';

$id = "";
$judul = "";
$penulis = "";
$penerbit = "";
$tahun = "";

$edit = false;

if (isset($_GET['id'])) {

    $edit = true;

    $data = getBukuById($_GET['id']);

    $id = $data['id_buku'];
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun_terbit'];
}

if (isset($_POST['simpan'])) {

    insertBuku(
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun']
    );

    header("Location: Buku.php");
    exit;
}

if (isset($_POST['update'])) {

    updateBuku(
        $_POST['id'],
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun']
    );

    header("Location: Buku.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Form Buku</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:"Segoe UI",sans-serif;
            background:#f4f7fb;

            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            padding:40px;
        }

        .card{

            width:100%;
            max-width:700px;

            background:white;

            padding:40px;

            border-radius:18px;

            box-shadow:
            0 5px 20px rgba(0,0,0,0.08);
        }

        h2{

            text-align:center;

            color:#1E3A8A;

            margin-bottom:30px;

            font-size:32px;
        }

        .form-group{

            margin-bottom:20px;
        }

        label{

            display:block;

            margin-bottom:8px;

            font-weight:600;

            color:#374151;
        }

        input{

            width:100%;

            padding:12px;

            border:1px solid #D1D5DB;

            border-radius:8px;

            font-size:15px;
        }

        input:focus{

            outline:none;

            border-color:#2563EB;
        }

        .action{

            display:flex;

            justify-content:center;

            gap:12px;

            margin-top:25px;
        }

        button{

            background:#2563EB;

            color:white;

            border:none;

            padding:12px 24px;

            border-radius:8px;

            cursor:pointer;

            font-size:15px;

            font-weight:600;

            transition:0.3s;
        }

        button:hover{

            background:#1E3A8A;
        }

        .kembali{

            text-decoration:none;

            background:#64748B;

            color:white;

            padding:12px 24px;

            border-radius:8px;

            font-weight:600;

            transition:0.3s;
        }

        .kembali:hover{

            background:#475569;
        }

    </style>

</head>

<body>

<div class="card">

    <h2>

        <?php

        if ($edit) {
            echo "Edit Buku";
        }
        else {
            echo "Tambah Buku";
        }

        ?>

    </h2>

    <form method="post">

        <input
        type="hidden"
        name="id"
        value="<?= $id; ?>">

        <div class="form-group">

            <label>Judul Buku</label>

            <input
            type="text"
            name="judul"
            value="<?= $judul; ?>"
            required>

        </div>

        <div class="form-group">

            <label>Penulis</label>

            <input
            type="text"
            name="penulis"
            value="<?= $penulis; ?>"
            required>

        </div>

        <div class="form-group">

            <label>Penerbit</label>

            <input
            type="text"
            name="penerbit"
            value="<?= $penerbit; ?>"
            required>

        </div>

        <div class="form-group">

            <label>Tahun Terbit</label>

            <input
            type="number"
            name="tahun"
            value="<?= $tahun; ?>"
            required>

        </div>

        <div class="action">

            <?php if ($edit) : ?>

                <button
                type="submit"
                name="update">

                    Update

                </button>

            <?php else : ?>

                <button
                type="submit"
                name="simpan">

                    Simpan

                </button>

            <?php endif; ?>

            <a
            class="kembali"
            href="Buku.php">

                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>