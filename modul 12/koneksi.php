<?php

$con = new mysqli("localhost","root","","db_praktik","3308");

if ($con->connect_error){
    die("connection failedL ". $con->connect_error);
}


?>