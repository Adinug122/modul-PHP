<?php
//memanggil koneksi.php untuk koneksi dengan database
require_once 'koneksi.php';

$db = new Database();


//mengecek apakah tombol input diklik

    if (isset($_POST["namaDosen"])){

        //membuat variable untuk mnampung data dari form

        $namaDosen = $_POST['namaDosen'];
        $noHP = $_POST['noHP'];

        //jalankan query menamnah data ke database

        $query = "INSERT INTO t_dosen (namaDosen,noHP) VALUES (?, ?)";
        $statement = $db->prepare($query);
       
        $statement->bind_param("ss",$namaDosen,$noHP);

          if ($statement->execute()) {
       header("location:viewdosen.php");
    } else {
        
        die("Error saat insert data: " . $statement->error);
    }
    
    }

    //melakukan redicet ke halaman view dosen.php

?>
