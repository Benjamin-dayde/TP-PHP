<?php


class Utilisateur {

public $pseudo;
public $Mp;


function __construct(string $pseudo, string $Mp) {
    $this->pseudo;
    $this->Mp;
}

function getPseudo(): string {
    return $this->pseudo;
}

function setPseudo($pseudo) {
    $this->pseudo = $_POST["pseudo"];
}


function getMp(): string {
    return $this->Mp;
}

function setMp($Mp) {
    $this->Mp = $_POST["pass"];
}

function insert_user(){
    require 'form.php';
    $this->save_user();
}




function save_user() {        

$pseudo = fopen("utilisateur.json", "a+");
fwrite($pseudo, json_encode($_POST));
fclose($pseudo);

}








};