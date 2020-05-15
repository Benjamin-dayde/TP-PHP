<?php

class Utilisateur extends DbConnect {

 //------ Variable utilisé pour implementé l'utilisateur---------//

    protected $id_user;
    public $pseudo;
    public $Mp;
    
 //--------------- Constructeur ----------------//

    function __construct($id_user = null) {
        parent:: __construct($id_user); 
    }

 //--------------- Permet de selectionné toutes les ligne de notre table ----------------//

    function selectAll() {
        $query = "SELECT * FROM user;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();

        $tab = [];

        foreach ($datas as $data) {
            $current = new Utilisateur();
            $current->setId($data['id_user']);

            array_push($tab, $current);
        }
        return $tab;
    }

 //--------------- Permet de selectionné une ligne de notre table ----------------//

    function select() {



    }

 //----------------Recupére le pseudo d'un utilisateur dans la base de donnée -----------//

    function selectByPseudo() {
        $query = "SELECT pseudo, MP FROM user WHERE pseudo=:pseudo;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }

 //--------------- Permet de inseré une ligne dans une table de notre BDD ----------------//

    function insert() {
        
        $query = "INSERT INTO user (pseudo, MP) 
        VALUE (:pseudo, :MP)";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $result->bindValue(':MP', $this->Mp, PDO::PARAM_STR);
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;

    }

 //--------------- Permet de modifié la BDD (ligne ou table) ----------------//

    function update() {

    }

 //--------------- Permet de supprimé la BDD (ligne ou table) ----------------//
    
    function delete() {

    }

 //----------- Récupéré une propriété d'une classe -----------------//

    function getPseudo(): string {
        return $this->pseudo;
    }

 //---------- Modifie la propriété d'une classe -------------//

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

//----------- Récupéré une propriété d'une classe -----------------//

    function getMp(): string {
        return $this->Mp;
    }

 //---------- Modifie la propriété d'une classe -------------//

    function setMp($Mp) {
        $this->Mp = $Mp;
    }

 //--------------- Permet de sauvegardé un utilisateur dans un fichier ----------------//

    // function save_user() {

    // $user = file_get_contents("utilisateur.json");
    // $tableaux = json_decode($user);
    // array_push($tableaux,["id"=>sizeof($tableaux)+1, "pseudo"=> $this->pseudo, "motdepasse"=> $this->Mp]);
    // file_put_contents("utilisateur.json", json_encode($tableaux));

    // }

 //--------------- Permet de verfié si un utilisateur existe dans un fichier ----------------//

    // function verify_user() {

    //     $connect = json_decode(file_get_contents("utilisateur.json"));

    //     foreach ($connect as $user1) {
    //         if ($user1->pseudo == $_POST["pseudo"] && password_verify($this->Mp, $user1->motdepasse)) {
    //             return $user1;
    //         } else {
    //             return false;
    //         }
    //     }

    // }

};