<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 * @ORM\Table(name="Categorie")
 *
 */
class Categorie
{
//--------------------- ID -----------------------------------------------------

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string",length=50)
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

//--------------------- LIBELLE -----------------------------------------------------

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $libelle;

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }

//--------------------- ARTICLE -----------------------------------------------------

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="categorie")
     */

    private $article;

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article): void
    {
        $this->article = $article;
    }

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }
}
