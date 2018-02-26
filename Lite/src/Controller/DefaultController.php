<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/categories")
     */

    public function categories(){
        return new Response('les catégories');
    }

    /**
     * @Route("/categorie/{id})
     */

    public function categorie(Categorie $categorie){
        return $this->render('categorie.html.twig',[
            'categorie'=>$categorie
        ]);

    }

    /**
     * @Route("/ajouter-une-categorie")
     */
    public function addCategorie(Request $request){
        $categorie = new Categorie();

        $form = $this->createFormBuilder($categorie)
            ->add('libelle', TextType::class)
            ->add('submit',SubmitType::class)
            ->getForm();

        $form->handleRequest ($request);

        if ($form->isSubmitted() && $form->isValid()):
            $categorie = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            $this->redirectToRoute('app_default_categorie',[
                'id'=> $categorie->getId()
            ]);

        endif;

        return $this->render('addcategorie.html.twig',[
            'form'=> $form->createView()
        ]);
    }
}
