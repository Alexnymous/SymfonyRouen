<?php

class Eleve
{
    #Propriete

    private $_nom,
            $_prenom;

    protected $_mail;

    #methode

    public function getNomComplet(){
        echo $this->_nom . '' . $this->_prenom;
    }


}

$mon_eleve = new Eleve();
echo $mon_eleve->_prenom;
$mon_eleve->getNomComplet();

