<?php

class Manusia
{
    protected $name;
    protected $nik = "123212121243243";

    protected $umur;
    public function setNama($name)
    {
        $this->name = $name;
    }

    public function getNama()
    {
        return $this->name;
    }
    public function getNIK()
    {
        return " NIK adalah {$this->nik}";
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
    
    public function getUmur()
    {
        return "umur adalah {$this->umur}";
    }

}

