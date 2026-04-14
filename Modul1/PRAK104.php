<?php
$data = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK104</title>
    <style>
        table {
            border: 3px solid black; 
            border-collapse: separate;
            border-spacing: 5px; 
            width: 300px;
        }

        th {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
            background-color: #ddd;
        }

        td {
            border: 2px solid black;
            padding: 8px;
            background-color: #f9f9f9;
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