<?php

abstract class DbConnect implements Crud {

    protected $pdo;
    protected $id;

    function __construct($id = null) {
        $this->pdo = new PDO(DATABASE, LOGIN, PASSWD);
        $this->id = $id;
    }

 //----------- Récupéré une propriété d'une classe -----------------//

    function getId () : ?int {
        return $this->id;
    }

//---------- Methode l'interface Crud -------------//

    abstract function selectAll();

    abstract function select();

    abstract function insert();

    abstract function update();
    
    abstract function delete();
}