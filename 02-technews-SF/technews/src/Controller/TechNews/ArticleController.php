<?php

namespace App\Controller\TechNews;

use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    use Helper;

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

    /**
     * Formulaire pour ajouter un article
     * @Route("/creer-un-article", name="article_add")
     */
    public function addarticle(Request,$request)
    {
        # Récupération des catégories
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();

        # Création d'un nouvel article
        $article = new Article();

        # Réceupération auteur de l'article
        $auteur = $this->getDoctrine()
            ->getRepository(Auteur::class)
            ->find(1);

        $article->setAuteur($auteur);

        #Création formaulaire article
        $form = $this->createFormBuilder($article)

        # Champ TITREARTICLE

        ->add('titre,', TextType::class,[
            'required' => true,
            'label'    => false,
            'attr'     => [
                'class'     =>'form-control',
                'placeholder'   => 'Titre de l\'article'
            ]
        ])

        # Champ CATEGORIE
        ->add('categorie', EntityType::class,[
            'class'         => Categorie::class,
            'choice_label'  =>'libelle',
            'expanded'      =>false,
            'multiple'      =>false,
            'required'      =>true,
            'attr'          => [
                'class'     => 'form-control'
            ]
        ])

        # Champ CONTENU

        ->add('contenu', TextareaType::class, [
            'required'      =>true,
            'label'         =>false,
            'attr'          =>[
                'class'     => 'form-control'
            ]
        ])

        # Champ FEATUREDIMAGE
        ->add('featuredimage', FileType::class,[
            'required'      => false,
            'label'         =>false,

        ])

        # Champ SPECIAL
        ->add('special', CheckboxType::class, array(
            'label' => false,
            'required' => false
        ))

        # Champ SPOTLIGHT
        ->add('spotlight', CheckboxType::class, array(
            'label' => false,
            'required' => true,
        ))

        #Champ SUBMIT
        ->add('submit', SubmitType::class,[
            'label'     =>'Publier',
            'required'  =>false
        ]);

        $form->getForm();

        #traiement des données post

        $form->handleRequest($request);

        #Vérif des données du form

        if ($form->isSubmitted() && $form->isValid()):

            #Récupération des données
            $article =$form->getData();

            #Récupération de l'image
            $image = $article->getFeaturedimage();

            #Nom du fichier
            $filename = $this->slugify($article->getTitre()).$image->guessExtension();




        endif;




        # Affichage du Formulaire dans la Vue

        return $this->render('article/ajouterarticle.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
