<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PRAK501 - Sistem Perpustakaan</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(
                135deg,
                #1E3A8A,
                #2563EB,
                #60A5FA
            );
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 50px;
            border-radius: 20px;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.15);

            text-align: center;
            width: 90%;
            max-width: 700px;
        }

        h1 {
            color: #1E3A8A;
            margin-bottom: 15px;
            font-size: 38px;
        }

        .subtitle {
            color: #6B7280;
            margin-bottom: 40px;
            font-size: 16px;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .menu a {
            text-decoration: none;

            background: #2563EB;
            color: white;

            padding: 15px 35px;

            border-radius: 10px;

            font-size: 16px;
            font-weight: 600;

            transition: 0.3s;
        }

        .menu a:hover {
            background: #1E3A8A;
            transform: translateY(-3px);
        }

        @media (max-width: 600px) {

            .container {
                padding: 30px;
            }

            .menu {
                flex-direction: column;
            }

            .menu a {
                width: 100%;
            }
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Sistem Perpustakaan</h1>

        <p class="subtitle">
            Kelola data member, buku, dan peminjaman dengan mudah
        </p>

        <div class="menu">

            <a href="Member.php">
                Member
            </a>

            <a href="Buku.php">
                Buku
            </a>

            <a href="Peminjaman.php">
                Peminjaman
            </a>

        </div>

    </div>

</body>
</html>