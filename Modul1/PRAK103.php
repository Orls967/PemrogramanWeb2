<?php
$celcius = 37.841;
$fahrenheit = ($celcius * 9/5) + 32;
$reamur = $celcius * 4/5;
$kelvin = $celcius + 273.15;
$f = number_format($fahrenheit, 4);
$r = number_format($reamur, 4);
$k = number_format($kelvin, 3);
echo "Celcius = $celcius<br><br>";
echo "Fahrenheit (F) = $f<br>";
echo "Reamur (R) = $r<br>";
echo "Kelvin (K) = $k";
?>