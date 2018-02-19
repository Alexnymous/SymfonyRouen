<?php

#importation de l'autoload de composer

require_once 'vendor/autoload.php';

#contenu de démonstration

class Contact{
    private $_firstName,
            $_lastName;

    public function __construct($_firstName, $_lastName){
        $this->_firstName = $_firstName;
        $this->_lastName = $_lastName;
    }
}

$unstring = 'une chaine de caractère';
$unArray = ['Hugo', 'Hocine', 'Alexandre'];
$unObjet = new Contact('Hugo', 'Liegeard');

\Symfony\Component\VarDumper\VarDumper::dump($unstring);
\Symfony\Component\VarDumper\VarDumper::dump($unArray);
\Symfony\Component\VarDumper\VarDumper::dump($unObjet);