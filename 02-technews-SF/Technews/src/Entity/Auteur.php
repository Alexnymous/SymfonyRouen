<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuteurRepository")
 * @ORM\Table(name="Auteur")
 */
class Auteur
{
//--------------------- ID-----------------------------------------------------

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


//--------------------- PRENOM ------------------------------
    /**
     * @ORM\Column(type="string", length=255)
     */

    private $prenom;

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

//--------------------- NOM ----------------------------------

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

//--------------------- EMAIL -------------------------------

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */

    private $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

//--------------------- PASSWORD -----------------------------

    /**
     * @ORM\Column(type="string", length=60)
     */

    private $password;

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

//--------------------- DATEINSCRIPTION ----------------------

    /**
     * @ORM\Column(type="datetime")
     */

    private $dateinscription;

    /**
     * @return mixed
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * @param mixed $dateinscription
     */
    public function setDateinscription($dateinscription): void
    {
        $this->dateinscription = $dateinscription;
    }


//--------------------- ROLES ------------------------------
    /**
     * @ORM\Column(type="array")
     */

    private $roles;

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

//--------------------- DERNIERECONNEXION -------------------
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */

    private $derniereconnexion;

    /**
     * @return mixed
     */
    public function getDerniereconnexion()
    {
        return $this->derniereconnexion;
    }

    /**
     * @param mixed $derniereconnexion
     */
    public function setDerniereconnexion($derniereconnexion): void
    {
        $this->derniereconnexion = $derniereconnexion;
    }

//--------------------- ARTICLES --------------------------

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="auteur")
     * @ORM\JoinColumn(nullable=true)
     */

    private $articles;

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param mixed $articles
     */
    public function setArticles($articles): void
    {
        $this->articles = $articles;
    }

    public function __construct() {
        $this->articles = new ArrayCollection();
        $this->dateinscription = new ArrayCollection();
    }





}
