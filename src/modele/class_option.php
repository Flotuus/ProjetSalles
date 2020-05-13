<?php

class Option{
    private $db;
    private $insert;
    private $select;
    private $selectById;
    private $update;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert into option(libelle,prix) values (:libelle,:prix)");
        $this->select = $db->prepare("select * from option");
        $this->selectById = $db->prepare("select * from option where id=:id");
        $this->update = $db->prepare("UPDATE option SET libelle=:libelle,prix=:prix where id=:id");

    }

    public function insert($nom,$prix){
        $r = true;
        $this->insert->execute(array(':libelle'=>$nom, ':prix'=>$prix));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
    }

    public function select(){
        $liste = $this->select->execute();
        if ($this->select->errorCode()!=0){
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();

    }
    public function selectById($id)
    {
        $this->selectById->execute(array(':id' => $id));
        if ($this->selectById->errorCode() != 0) {
            print_r($this->selectById->errorInfo());
        }
        return $this->selectById->fetch();


    }
    public function update($nom,$prix,$id)
    {
        $r = true;
        $this->update->execute(array(':libelle' => $nom, ':prix' => $prix, ':id' => $id));
        if ($this->update->errorCode() != 0) {
            print_r($this->update->errorInfo());
            $r = false;
        }
        return $r;
    }

}