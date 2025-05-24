<?php
//memanggil koneksi.php untuk koneksi dengan database
include 'koneksi.php';

//mengecek apakah tombol input diklik

if (isset($_POST["namaDosen"])){

    //membuat variable untuk mnampung data dari form

    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    //jalankan query menamnah data ke database

    $query = "INSERT INTO t_dosen VALUES (NULL, '$namaDosen', '$noHP')";
    $result = mysqli_query($link, $query);

    //periksa query apakah error
    
    if(!$result){
        die ("query gagal dijalankan: ".mysqli_errno($link).
        " - ".mysqli_error($link));
    }
}

//melakukan redicet ke halaman view dosen.php
header("location:viewdosen.php");
?>
