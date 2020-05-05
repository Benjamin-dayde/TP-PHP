<?php

class Utilisateur extends DbConnect {

    protected $iduser;
    public $pseudo;
    public $Mp;


    function __construct($iduser = null) {
        parent:: __construct($iduser); 
    }

    function selectAll() {

    }

    function select() {

    }

    function insert() {

    }

    function update() {

    }
    
    function delete() {

    }

    function getPseudo(): string {
        return $this->pseudo;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }


    function getMp(): string {
        return $this->Mp;
    }

    function setMp($Mp) {
        $this->Mp = $Mp;
    }


    function save_user() {

    $user = file_get_contents("utilisateur.json");
    $tableaux = json_decode($user);
    array_push($tableaux,["id"=>sizeof($tableaux)+1, "pseudo"=> $this->pseudo, "motdepasse"=> $this->Mp]);
    file_put_contents("utilisateur.json", json_encode($tableaux));

    }

    function verify_user() {


    $connect = json_decode(file_get_contents("utilisateur.json"));

    foreach ($connect as $user1) {
        if ($user1->pseudo == $_POST["pseudo"] && password_verify($this->Mp, $user1->motdepasse)) {
            header('Location:index.php?route=home');
        } else {
            header('location:index.php?route=connection');
        }
    }



    }







};