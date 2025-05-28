<?php

class Matakuliah
{
private $con;
private $table = "t_matakuliah";
public $kodeMK, $namaMK,$SKS,$JAM,$oldKodeMK;

public function __construct($db)
{
    $this->con = $db;
}

public function create()
{
    $query = "INSERT INTO $this->table (kodeMK,namaMK,SKS,JAM) VALUES (?,?,?,?)";
    $statement = $this->con->prepare($query);
    return $statement->execute([$this->kodeMK,$this->namaMK,$this->SKS,$this->JAM]);
}

public function update()
{
 $query ="UPDATE {$this->table} SET kodeMK=?,namaMK =?,SKS=?,JAM =? WHERE kodeMK= ?";
    $statement = $this->con->prepare($query);
    return $statement->execute([$this->kodeMK,$this->namaMK,$this->SKS, $this->JAM, $this->oldKodeMK]);
}

public function tampilkan()
{
    return $this->con->query("SELECT * FROM $this->table");
}

public function delete()
{
 $query ="DELETE FROM $this->table WHERE kodeMK = ?";
    $statement = $this->con->prepare($query);
        return $statement->execute([$this->kodeMK]);
}
public function cari($id)
{
 $statement = $this->con->prepare("SELECT * FROM {$this->table} WHERE kodeMK =?");
    
    $statement->execute([$id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}


}