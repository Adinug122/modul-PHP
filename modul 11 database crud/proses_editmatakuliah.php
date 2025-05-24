<?php

if (isset($_POST['edit'])){
    include("koneksi.php");

    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $SKS = $_POST['SKS'];
    $JAM = $_POST['JAM'];

    $query = "UPDATE t_matakuliah SET namaMK = '$namaMK',SKS = '$SKS' , JAM ='$JAM' WHERE kodeMK = '$kodeMK'";

    $result = mysqli_query($link, $query);

    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($link).
        " - ".mysqli_error($link));
    }

}

header("location:viewMataKuliah.php");
?>