<?php
//memanggil koneksi.php untuk koneksi dengan database
include 'koneksi.php';

//mengecek apakah tombol input diklik

if (isset($_POST["kodeMK"])) {

    //membuat variable untuk mnampung data dari form
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $SKS = $_POST['SKS'];
    $JAM = $_POST['JAM'];

    //jalankan query menamnah data ke database

    $query = "INSERT INTO t_matakuliah (kodeMK, namaMK, SKS, JAM) VALUES ('$kodeMK','$namaMK', '$SKS', '$JAM')";
    $result = mysqli_query($link, $query);

    //periksa query apakah error

    if (!$result) {
        die("query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

//melakukan redicet ke halaman view Mahasiswa.php
header("location:viewMataKuliah.php");
?>