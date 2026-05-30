<?php

require 'Model.php';

if (isset($_GET['hapus'])) {

    deletePeminjaman($_GET['hapus']);

    header("Location: Peminjaman.php");
    exit;
}

$dataPeminjaman = getAllPeminjaman();

?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Peminjaman</title>

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
            padding:40px;
        }

        .container{
            max-width:1400px;
            margin:auto;
        }

        h2{
            text-align:center;
            color:#1E3A8A;
            margin-bottom:30px;
            font-size:36px;
        }

        .action-bar{
            display:flex;
            justify-content:center;
            gap:15px;
            margin-bottom:30px;
        }

        a{
            text-decoration:none;
        }

        .btn{
            color:white;
            padding:12px 22px;
            border-radius:8px;
            font-weight:600;
            transition:0.3s;
            display:inline-block;
        }

        .tambah{
            background:#2563EB;
        }

        .tambah:hover{
            background:#1E40AF;
        }

        .kembali{
            background:#64748B;
        }

        .kembali:hover{
            background:#475569;
        }

        .ubah{
            background:#F59E0B;
        }

        .ubah:hover{
            background:#D97706;
        }

        .hapus{
            background:#EF4444;
        }

        .hapus:hover{
            background:#DC2626;
        }

        .table-container{
            background:white;
            border-radius:18px;
            overflow:hidden;

            box-shadow:
            0 5px 20px rgba(0,0,0,0.08);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#1E3A8A;
            color:white;
            padding:16px;
        }

        td{
            padding:14px;
            text-align:center;
            border-bottom:1px solid #E5E7EB;
        }

        tr:hover{
            background:#F8FAFC;
        }

        .aksi{
            display:flex;
            justify-content:center;
            gap:10px;
        }

        .empty{
            text-align:center;
            padding:30px;
            color:#64748B;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Data Peminjaman</h2>

    <div class="action-bar">

        <a
        class="btn tambah"
        href="FormPeminjaman.php">

            Tambah Peminjaman

        </a>

        <a
        class="btn kembali"
        href="Index.php">

            Kembali

        </a>

    </div>

    <div class="table-container">

        <table>

            <tr>

                <th>ID</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>

            </tr>

            <?php if(mysqli_num_rows($dataPeminjaman) > 0) : ?>

                <?php while ($row = mysqli_fetch_assoc($dataPeminjaman)) : ?>

                <tr>

                    <td>
                        <?php echo $row['id_peminjaman']; ?>
                    </td>

                    <td>
                        <?php echo $row['nama_member']; ?>
                    </td>

                    <td>
                        <?php echo $row['judul_buku']; ?>
                    </td>

                    <td>
                        <?php echo $row['tgl_pinjam']; ?>
                    </td>

                    <td>
                        <?php echo $row['tgl_kembali']; ?>
                    </td>

                    <td>

                        <div class="aksi">

                            <a
                            class="btn ubah"
                            href="FormPeminjaman.php?id=<?php echo $row['id_peminjaman']; ?>">

                                Ubah

                            </a>

                            <a
                            class="btn hapus"
                            href="Peminjaman.php?hapus=<?php echo $row['id_peminjaman']; ?>"
                            onclick="return confirm('Hapus data?')">

                                Hapus

                            </a>

                        </div>

                    </td>

                </tr>

                <?php endwhile; ?>

            <?php else : ?>

                <tr>

                    <td
                    colspan="6"
                    class="empty">

                        Belum ada data peminjaman

                    </td>

                </tr>

            <?php endif; ?>

        </table>

    </div>

</div>

</body>
</html>