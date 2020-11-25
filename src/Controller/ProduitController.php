<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Dumper;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repository->findAll();
        // dd($produits);

        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produits'=> $produits
        ]);
    }
    /** 
     * @Route("/produit/nouvelle", name="nouvelle_route")
     */
    public function nouvelleRoute(){
        $age = 18;
        $prenom = "lauriane";
        return $this->render('produit/nouvelle.html.twig', [
            "monage" => $age,
            "prenom" => $prenom
        ]);
    }
    /** 
     * @Route("/produit/create", name="create_route")
     */
    public function createRoute(){
        return $this->render('produit/create.html.twig');
    }
    /** 
     * @Route("/produit/{id}", name="affiche_produit")
     */
    public function affichage($id){
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produit = $repository->find($id);

        return $this->render('produit/affiche.html.twig',[
        "produit" => $produit
        ]);
    }

}
