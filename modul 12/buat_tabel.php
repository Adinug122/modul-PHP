<?php

$con = new mysqli("localhost","root","","db_praktik","3308");

if ($con->connect_error){
    die("connection failedL ". $con->connect_error);
}

$q="CREATE TABLE t_login(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

//kirim kueri ke server basis data
$hasil=$con->query($q);

if( $hasil === TRUE){
    echo "tabel t_login berhasil dibuat";
}else{
    echo "tabel gagal dibuat";
}
?>