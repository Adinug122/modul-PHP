<?php
require_once 'koneksi.php';
$db = new Database();

if (isset($_GET["idDosen"])){

    $id = $_GET["idDosen"];

    $query = "DELETE FROM t_dosen WHERE idDosen=? ";
   $statement = $db->prepare($query);
    $statement->bind_param("i",$id);

  if($statement->execute()){
      header("location:viewdosen.php");
    }else{
        die("error ".$statement->error);
    }

}

?>