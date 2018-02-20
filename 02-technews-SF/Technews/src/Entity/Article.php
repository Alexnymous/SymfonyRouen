<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @ORM\Table(name="Article")
 */
class Article
{

//--------------------- ID -----------------------------.
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
//--------------------- TITRE ---------------------------
    /**
     * @ORM\Column(type="string", length=150)
     */

    private $titre;

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

//--------------------- CONTENU --------------------------
    /**
     * @ORM\Column(type="text")
     */

    private $contenu;

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;
    }

//--------------------- FEATUREDIMAGE ----------------------

    /**
     * @ORM\Column(type="string", length=50)
     */

    private $featuredimage;

    /**
     * @return mixed
     */
    public function getFeaturedimage()
    {
        return $this->featuredimage;
    }

    /**
     * @param mixed $featuredimage
     */
    public function setFeaturedimage($featuredimage): void
    {
        $this->featuredimage = $featuredimage;
    }

//--------------------- SPECIAL --------------------------

    /**
     * @ORM\Column(type="boolean")
     */
    private $special;

    /**
     * @return mixed
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param mixed $special
     */
    public function setSpecial($special): void
    {
        $this->special = $special;
    }
//--------------------- AUTEUR --------------------------

    /**
     * @ORM\Column(type="boolean")
     */
    private $spotlight;

    /**
     * @return mixed
     */
    public function getSpotlight()
    {
        return $this->spotlight;
    }

    /**
     * @param mixed $spotlight
     */
    public function setSpotlight($spotlight): void
    {
        $this->spotlight = $spotlight;
    }


//--------------------- DATECREATION ---------------------
    /**
     * @ORM\Column(type="datetime")
     */

    private $datecreation;

    /**
     * @return mixed
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * @param mixed $datecreation
     */
    public function setDatecreation($datecreation): void
    {
        $this->datecreation = $datecreation;
    }


//--------------------- CATEGORIE -------------------------
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     */

    private $categorie;

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }


//--------------------- AUTEUR -----------------------------
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Auteur", inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     */

    private $auteur;

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur): void
    {
        $this->auteur = $auteur;
    }

}
