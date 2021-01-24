<?php

namespace App\Controller;

use App\Entity\Medicijnen;
use App\Entity\Recepten;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApothekerController extends AbstractController
{
    /**
     * @Route("/apotheker", name="Ahomepage")
     */
    public function homepage()
    {
        return $this ->render('apotheker/Ahome.html.twig');
    }

    /**
     * @Route("/apotheker/recept", name="Rtable")
     */

    public function bezoekerMedicijnen()
    {
        $repository =$this->getDoctrine()->getRepository(Recepten::class);
        $recepten =$repository->findAll();
        return $this->render('apotheker/ReceptTable.html.twig',['recepten'=> $recepten]);
    }
}
