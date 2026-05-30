<?php

require 'Model.php';

$id = "";
$nama = "";
$nomor = "";
$alamat = "";
$tgl_daftar = "";
$tgl_bayar = "";

$error = "";

if (isset($_GET['id'])) {

    $data = getMemberById($_GET['id']);

    $id = $data['id_member'];
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $tgl_daftar = $data['tgl_mendaftar'];
    $tgl_bayar = $data['tgl_terakhir_bayar'];
}

if (isset($_POST['simpan'])) {

    $nama = trim($_POST['nama']);
    $nomor = trim($_POST['nomor']);
    $alamat = trim($_POST['alamat']);
    $tgl_daftar = trim($_POST['tgl_daftar']);
    $tgl_bayar = trim($_POST['tgl_bayar']);

    if (
        empty($nama) ||
        empty($nomor) ||
        empty($alamat) ||
        empty($tgl_daftar) ||
        empty($tgl_bayar)
    ) {

        $error = "Semua data harus diisi";
    }

    else {

        insertMember(
            $nama,
            $nomor,
            $alamat,
            $tgl_daftar,
            $tgl_bayar
        );

        header("Location: Member.php");
        exit;
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $nama = trim($_POST['nama']);
    $nomor = trim($_POST['nomor']);
    $alamat = trim($_POST['alamat']);
    $tgl_daftar = trim($_POST['tgl_daftar']);
    $tgl_bayar = trim($_POST['tgl_bayar']);

    if (
        empty($nama) ||
        empty($nomor) ||
        empty($alamat) ||
        empty($tgl_daftar) ||
        empty($tgl_bayar)
    ) {

        $error = "Semua data harus diisi";
    }

    else {

        updateMember(
            $id,
            $nama,
            $nomor,
            $alamat,
            $tgl_daftar,
            $tgl_bayar
        );

        header("Location: Member.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Form Member</title>

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

            border-radius:18px;

            padding:40px;

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

        input,
        textarea{
            width:100%;
            padding:12px;

            border:1px solid #D1D5DB;
            border-radius:8px;

            font-size:15px;
        }

        input:focus,
        textarea:focus{
            outline:none;
            border-color:#2563EB;
        }

        textarea{
            resize:vertical;
        }

        .error{
            background:#FEE2E2;
            color:#DC2626;

            padding:12px;
            border-radius:8px;

            margin-bottom:20px;
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

    if ($id == "") {
        echo "Tambah Member";
    }
    else {
        echo "Edit Member";
    }

    ?>

    </h2>

    <?php

    if (!empty($error)) {

        echo "<div class='error'>$error</div>";
    }

    ?>

    <form method="post">

        <input
        type="hidden"
        name="id"
        value="<?php echo $id; ?>">

        <div class="form-group">

            <label>Nama Member</label>

            <input
            type="text"
            name="nama"
            value="<?php echo $nama; ?>">

        </div>

        <div class="form-group">

            <label>Nomor Member</label>

            <input
            type="text"
            name="nomor"
            value="<?php echo $nomor; ?>">

        </div>

        <div class="form-group">

            <label>Alamat</label>

            <textarea
            name="alamat"
            rows="4"><?php echo $alamat; ?></textarea>

        </div>

        <div class="form-group">

            <label>Tanggal Mendaftar</label>

            <input
            type="datetime-local"
            name="tgl_daftar"
            value="<?php echo str_replace(' ', 'T', $tgl_daftar); ?>">

        </div>

        <div class="form-group">

            <label>Tanggal Terakhir Bayar</label>

            <input
            type="date"
            name="tgl_bayar"
            value="<?php echo $tgl_bayar; ?>">

        </div>

        <div class="action">

            <?php if ($id == "") : ?>

                <button
                type="submit"
                name="simpan">

                    Simpan

                </button>

            <?php else : ?>

                <button
                type="submit"
                name="update">

                    Update

                </button>

            <?php endif; ?>

            <a
            class="kembali"
            href="Member.php">

                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>