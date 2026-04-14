<?php
$alas = 8.9;       
$tinggiSegitiga = 7.9;  
$tinggiPrisma = 5.4;
$volume = (0.5 * $alas * $tinggiSegitiga) * $tinggiPrisma;
$hasil = number_format($volume, 3);
echo "Alas = $alas<br>";
echo "Tinggi Segitiga = $tinggiSegitiga<br>";
echo "Tinggi Prisma = $tinggiPrisma<br><br>";
echo "Volume Prisma Segitiga = $hasil m3";
?>