<?php
 //$aujd = new DateTimeImmutable("now", new DateTimeZone("europe/Paris"));

// $annee_courante = $aujd->format("Y");
// $mois_courant = $aujd->format("M");
// $jour_courant = $aujd->format("d");

// echo "Nous sommes le $jour_courant/$mois_courant/$annee_courante";

class Month {

    protected $monthname;

    function getMonthName() {
        return $this->monthname;
    }

    function setMonthName($monthname) {
        $this->monthname = $monthname;
    }

}