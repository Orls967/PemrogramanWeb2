<?php

require 'Model.php';

$id = "";
$id_member = "";
$id_buku = "";
$tgl_pinjam = "";
$tgl_kembali = "";

$error = "";

$dataMember = getAllMember();
$dataBuku = getAllBuku();

if (isset($_GET['id'])) {

    $data = getPeminjamanById($_GET['id']);

    $id = $data['id_peminjaman'];
    $id_member = $data['id_member'];
    $id_buku = $data['id_buku'];
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];
}

if (isset($_POST['simpan'])) {

    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if (
        empty($id_member) ||
        empty($id_buku) ||
        empty($tgl_pinjam) ||
        empty($tgl_kembali)
    ) {

        $error = "Semua data harus diisi";
    }

    else {

        insertPeminjaman(
            $id_member,
            $id_buku,
            $tgl_pinjam,
            $tgl_kembali
        );

        header("Location: Peminjaman.php");
        exit;
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if (
        empty($id_member) ||
        empty($id_buku) ||
        empty($tgl_pinjam) ||
        empty($tgl_kembali)
    ) {

        $error = "Semua data harus diisi";
    }

    else {

        updatePeminjaman(
            $id,
            $id_member,
            $id_buku,
            $tgl_pinjam,
            $tgl_kembali
        );

        header("Location: Peminjaman.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Form Peminjaman</title>

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

        select,
        input{

            width:100%;

            padding:12px;

            border:1px solid #D1D5DB;

            border-radius:8px;

            font-size:15px;
        }

        select:focus,
        input:focus{

            outline:none;

            border-color:#2563EB;
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

            echo "Tambah Peminjaman";
        }

        else {

            echo "Edit Peminjaman";
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

            <label>Member</label>

            <select name="id_member">

                <option value="">
                    -- Pilih Member --
                </option>

                <?php while ($member = mysqli_fetch_assoc($dataMember)) : ?>

                    <option
                    value="<?php echo $member['id_member']; ?>"

                    <?php

                    if ($id_member == $member['id_member']) {

                        echo "selected";
                    }

                    ?>

                    >

                        <?php echo $member['nama_member']; ?>

                    </option>

                <?php endwhile; ?>

            </select>

        </div>

        <div class="form-group">

            <label>Buku</label>

            <select name="id_buku">

                <option value="">
                    -- Pilih Buku --
                </option>

                <?php while ($buku = mysqli_fetch_assoc($dataBuku)) : ?>

                    <option
                    value="<?php echo $buku['id_buku']; ?>"

                    <?php

                    if ($id_buku == $buku['id_buku']) {

                        echo "selected";
                    }

                    ?>

                    >

                        <?php echo $buku['judul_buku']; ?>

                    </option>

                <?php endwhile; ?>

            </select>

        </div>

        <div class="form-group">

            <label>Tanggal Pinjam</label>

            <input
            type="date"
            name="tgl_pinjam"
            value="<?php echo $tgl_pinjam; ?>">

        </div>

        <div class="form-group">

            <label>Tanggal Kembali</label>

            <input
            type="date"
            name="tgl_kembali"
            value="<?php echo $tgl_kembali; ?>">

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
            href="Peminjaman.php">

                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>