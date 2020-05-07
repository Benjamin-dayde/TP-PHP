<?php

interface Crud {

 //--------- Methode qui permette de Crée, Lire , Modifier ou supprimé se qui se trouve dans notre BDD ----------//

    function selectAll();

    function select();

    function insert();

    function update();
    
    function delete();
}