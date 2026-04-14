<?php
// Associative array
$data = [
    "hp1" => "Samsung Galaxy S22",
    "hp2" => "Samsung Galaxy S22+",
    "hp3" => "Samsung Galaxy A03",
    "hp4" => "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK105</title>
    <style>
        table {
            border: 4px solid black;
            border-collapse: separate;
            border-spacing: 5px;
            width: 350px;
        }

        th {
            border: 2px solid black;
            padding: 15px;
            text-align: center;
            background-color: red;
            color: black;
            font-size: 26px;
            font-weight: bold;
        }

        td {
            border: 2px solid black;
            padding: 10px;
            background-color: #f2f2f2;
            font-size: 18px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>

    <?php foreach ($data as $item): ?>
        <tr>
            <td><?php echo $item; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>