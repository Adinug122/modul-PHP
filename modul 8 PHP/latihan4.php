<?php
/* Operator logika yang bisa digunakan
* ==  Sama dengan            $x == $y
* === Identik                $x === $y
* !=  Tidak sama dengan      $x != $y
* <>  Tidak sama dengan      $x <> $y
* !== Tidak identik          $x !== $y
* >   Lebih besar dari       $x > $y
* <   Kurang dari            $x < $y
* >=  Lebih besar/sama       $x >= $y
* <=  Kurang dari/sama       $x <= $y
* <=> Spaceship              $x <=> $y
*/

$t = date("H"); // Ambil jam sekarang dalam format 24 jam

echo "Contoh If:<br>";
if ($t < 16) {
    echo "Selamat siang!";
}

echo "<br><br>Contoh If dan Else:<br>";
if ($t < 20) {
    echo "Selamat siang!";
} else {
    echo "Selamat malam!";
}

echo "<br><br>Contoh Nested If:<br>";
if ($t < 12) {
    echo "Selamat pagi!";
} elseif ($t < 16) {
    echo "Selamat sore!";
} else {
    echo "Selamat malam!";
}
 
?>
