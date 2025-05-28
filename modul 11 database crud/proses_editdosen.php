<?php

require_once 'koneksi.php';
$db = new Database();

if (isset($_POST['edit'])){
    

    $id = $_POST['idDosen'];
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    $query = "UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ? ";
    $statement = $db->prepare($query);
    $statement->bind_param("ssi",$namaDosen,$noHP,$id);
  

    if($statement->execute()){
      header("location:viewdosen.php");
    }else{
        die("error ".$statement->error);
    }

}


?>