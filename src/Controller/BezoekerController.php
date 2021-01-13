<?php

namespace App\Controller;

use App\Entity\Medicijnen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BezoekerController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        return $this ->render('bezoeker/home.html.twig');
    }

    /**
     * @Route("/medicijnen", name="mtable")
     */

    public function bezoekerMedicijnen()
    {
        $repository =$this->getDoctrine()->getRepository(Medicijnen::class);
        $medicijnen =$repository->findAll();
        return $this->render('bezoeker/medicijnen.html.twig',['medicijnen'=> $medicijnen]);
    }
}
