<?php

class Dosen
{
private $con;
private $table = "t_dosen";
public $idDosen, $namaDosen, $noHP;

public function __construct($db)
{
    $this->con = $db;
}

public function create()
{
    $query = "INSERT INTO {$this->table} (namaDosen, noHP) VALUES (:namaDosen, :noHP)";
    $statement = $this->con->prepare($query);
    $statement->bindParam(":namaDosen", $this->namaDosen);
    $statement->bindParam(":noHP", $this->noHP);
    return $statement->execute();
}

public function update()
{
 $query ="UPDATE {$this->table} SET namaDosen = :namaDosen, noHP = :noHP WHERE idDosen = :idDosen";
    $statement = $this->con->prepare($query);
    $statement->bindParam(":namaDosen", $this->namaDosen);
    $statement->bindParam(":noHP", $this->noHP);
    $statement->bindParam(":idDosen", $this->idDosen);
    return $statement->execute();
}
  public function readAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $statement = $this->con->prepare($query);
        $statement->execute();
        return $statement;
    }
public function delete()
{
 $query ="DELETE FROM {$this->table} WHERE idDosen = :idDosen";
    $statement = $this->con->prepare($query);
    $statement->bindParam(":idDosen", $this->idDosen);
    return $statement->execute();
}
public function cari($id)
{
 $statement = $this->con->prepare("SELECT * FROM {$this->table} WHERE idDosen =?");
    
    $statement->execute([$id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}


}