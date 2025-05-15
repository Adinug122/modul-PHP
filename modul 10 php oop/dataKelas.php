<?php

require_once ('kelas//Mahasiswa.php');

$mhs1 = new Mahasiswa(nama: "Adi Nugroho");
$mhs1->setNIM(243307061);
$mhs1->setKelas("2C-TI");
$mhs1->setjurusan("Teknologi Informasi");

echo "<h1>Mahasiswa 1</h1>";
echo("Nama: ".$mhs1->getNama()); echo"<br>";
echo("NIM: ". $mhs1->getNIM()); echo "<br>";
echo("kelas: " .$mhs1->getKelas()); echo "<br>";
echo("jurusan: ".$mhs1->getJurusan()); echo "<br>";

$mhs2 = new Mahasiswa("Pandu sagalang");
$mhs2->setNIM(243307085);
$mhs2->setKelas("2C-TI");
$mhs2->setjurusan("Teknologi Informasi");
echo"<h1>Mahasiswa 2</h1>";
echo("Nama: ".$mhs2->getNama()); echo"<br>";
echo("NIM: ". $mhs2->getNIM()); echo "<br>";
echo("kelas: " .$mhs2->getKelas()); echo "<br>";
echo("jurusan: ".$mhs2->getJurusan()); echo "<br>";

?>