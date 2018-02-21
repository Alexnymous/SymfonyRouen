<?php

namespace App\Controller\TechNews;

use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * Démonstration pour ajouter un article avec Doctrine
     * @Route("/article", name="article")
     */
    public function index()
    {
        # Création de la catégorie
        $categorie = new Categorie();
        $categorie->setLibelle('Business');

        # Création de l'auteur
        $auteur = new Auteur();
        $auteur->setPrenom('Gauthier');
        $auteur->setNom('BOSSON');
        $auteur->setEmail('bosson.gauthier27@gmail.com');
        $auteur->setPassword('test');

        # Création de notre article
        $article = new Article();
        $article->setTitre('Ceci est un titre');
        $article->setContenu('Ceci est un contenu');
        $article->setFeaturedimage('3.jpg');
        $article->setSpecial(0);
        $article->setSpotlight(1);

        # On associe une catégorie et un auteur à notre article
        $article->setCategorie($categorie);
        $article->setAuteur($auteur);

        # On sauvegarde le tout en BDD
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->persist($auteur);
        $em->persist($article);
        $em->flush();

        # Retour de la vue
        return new Response(
            'Nouvel article ajouté avec ID : ' .
            $article->getId() . ' et la nouvelle catégorie : ' .
            $categorie->getLibelle() . ' de Auteur : ' .
            $auteur->getPrenom()
        );
    }
}
