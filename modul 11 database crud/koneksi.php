<?php

$host = "localhost";
$user = "root";
$passwd = "";   
$name = "db_akademik"; 
$port = 3308;

$link = mysqli_connect($host, $user, $passwd, $name,$port);

// Periksa koneksi, jika gagal akan menampilkan pesan error
if (!$link) {
    die("Koneksi dengan database gagal: " .mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>
