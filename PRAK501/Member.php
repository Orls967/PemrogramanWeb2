<?php

require 'Model.php';

if (isset($_GET['hapus'])) {

    deleteMember($_GET['hapus']);

    header("Location: Member.php");
    exit;
}

$dataMember = getAllMember();

?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Member</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:"Segoe UI",sans-serif;
            background:#f4f7fb;
            padding:40px;
        }

        .container{
            max-width:1400px;
            margin:auto;
        }

        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        h2{
            color:#1E3A8A;
            font-size:32px;
        }

        .action{
            display:flex;
            gap:10px;
        }

        .btn{
            text-decoration:none;
            color:white;
            padding:10px 18px;
            border-radius:8px;
            font-weight:600;
            transition:0.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
        }

        .tambah{
            background:#10B981;
        }

        .tambah:hover{
            background:#059669;
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

        .kembali{
            background:#2563EB;
        }

        .kembali:hover{
            background:#1E3A8A;
        }

        .card{
            background:white;
            border-radius:15px;
            overflow:hidden;

            box-shadow:
            0 5px 20px rgba(0,0,0,0.08);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        thead{
            background:#1E3A8A;
            color:white;
        }

        th{
            padding:15px;
            font-size:15px;
        }

        td{
            padding:15px;
            text-align:center;
            border-bottom:1px solid #E5E7EB;
        }

        tbody tr:hover{
            background:#F9FAFB;
        }

        .aksi{
            display:flex;
            justify-content:center;
            gap:8px;
        }

        .empty{
            padding:30px;
            text-align:center;
            color:#6B7280;
        }

        @media(max-width:1200px){

            body{
                padding:20px;
            }

            .card{
                overflow-x:auto;
            }

            table{
                min-width:1000px;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h2>Data Member</h2>

        <div class="action">

            <a
            class="btn tambah"
            href="FormMember.php">

                Tambah Member

            </a>

            <a
            class="btn kembali"
            href="Index.php">

                Kembali

            </a>

        </div>

    </div>

    <div class="card">

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nama Member</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php if(mysqli_num_rows($dataMember) > 0): ?>

                <?php while ($row = mysqli_fetch_assoc($dataMember)) : ?>

                    <tr>

                        <td>
                            <?php echo $row['id_member']; ?>
                        </td>

                        <td>
                            <?php echo $row['nama_member']; ?>
                        </td>

                        <td>
                            <?php echo $row['nomor_member']; ?>
                        </td>

                        <td>
                            <?php echo $row['alamat']; ?>
                        </td>

                        <td>
                            <?php echo $row['tgl_mendaftar']; ?>
                        </td>

                        <td>
                            <?php echo $row['tgl_terakhir_bayar']; ?>
                        </td>

                        <td>

                            <div class="aksi">

                                <a
                                class="btn ubah"
                                href="FormMember.php?id=<?php echo $row['id_member']; ?>">

                                    Ubah

                                </a>

                                <a
                                class="btn hapus"
                                href="Member.php?hapus=<?php echo $row['id_member']; ?>"
                                onclick="return confirm('Hapus data?')">

                                    Hapus

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endwhile; ?>

            <?php else: ?>

                <tr>

                    <td
                    colspan="7"
                    class="empty">

                        Belum ada data member

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>