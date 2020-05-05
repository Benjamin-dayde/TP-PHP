<?php

class DbConnect extends Crud {

    protected $pdo
    protected $id

    function __construct($id) {
        $this->PDO = new PDO(DATABASE, LOGIN, PASSWD);
        $this->id = $id;
    }

    function getId () : ?int {
        return $this->id;
    }

    abstract function selectAll();
    abstract function select();
    abstract function insert();
    abstract function update();
    abstract function delete();
}