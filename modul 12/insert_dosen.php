<?php
$con = new mysqli("localhost","root","","db_praktik","3308");

if ($con->connect_error){
    die("connection failedL ". $con->connect_error);
}

$sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (10, 'Rahmat Dwi Prastya', 'rahmat@example.com')";

$hasil=$con->query($sql);

if ($hasil === TRUE){
    echo "Mengisi database";
}else{
    echo "error" . $con->error;
}

$con->close();
?>