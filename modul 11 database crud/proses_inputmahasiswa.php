<?php
//memanggil koneksi.php untuk koneksi dengan database
include 'koneksi.php';

//mengecek apakah tombol input diklik

if (isset($_POST["npm"])) {

    //membuat variable untuk mnampung data dari form
    $npm = $_POST['npm'];
    $namaMahasiswa = $_POST['namaMHS'];
    $noHP = $_POST['noHP'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    //jalankan query menamnah data ke database

    $query = "INSERT INTO t_mahasiswa (npm, namaMHS, prodi, alamat, noHP) VALUES ('$npm', '$namaMahasiswa', '$prodi', '$alamat', '$noHP')";
    $result = mysqli_query($link, $query);

    //periksa query apakah error

    if (!$result) {
        die("query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

//melakukan redicet ke halaman view Mahasiswa.php
header("location:viewMahasiswa.php");
