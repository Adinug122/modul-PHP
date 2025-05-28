<?php

class Database {
    private $host = "localhost";
private $user = "root";
private $passwd = "";   
private $name = "db_akademik"; 
private $port = 3308;
private $con;

public function __construct(){
    $this->con = new mysqli($this->host,$this->user,$this->passwd,$this->name,$this->port);
    if($this->con->connect_error){
        die ("koneksi gagal " . $this->con->connect_error);
    }
}

    public function prepare($query) {
        $statement = $this->con->prepare($query);
        if (!$statement) {
            die("Error prepare: " . $this->con->error);
        }
        return $statement;
    }

public function close(){
    $this->con->close();
}
}

?>
