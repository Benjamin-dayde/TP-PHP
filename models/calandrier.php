<?php

// $aujd = new DateTimeImmutable("now", new DateTimeZone("europe/Paris"));

// $annee_courante = $aujd->format("Y");
// $mois_courant = $aujd->format("m");
// $jour_courant = $aujd->format("d");

// echo "Nous sommes le $jour_courant/$mois_courant/$annee_courante";

class Month {

    protected $month;

    function __construct();

    function getMonth() {
        return $this->month;
    }

    function setMonth($month) {
        $this->month = $month;
    }

    $month = new Month(5);

    var_dump($month);
}