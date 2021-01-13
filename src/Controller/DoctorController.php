<?php

namespace App\Controller;

use App\Entity\Recept;
use App\Entity\Medicijnen;
use App\Form\MedicijnType;
use App\Form\ReceptType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctorController extends AbstractController
{
    /**
     * @Route("/doctor/creat", name="creatDM")
     */
    public function creat(EntityManagerInterface $em, Request $request)
    {
        $recept = new Recept();
        $form = $this->createForm(ReceptType::class, $recept);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($recept);
            $em->flush();

            return $this->redirectToRoute("Doctormtable");
        }

        return $this->render('doctor/doctorM.html.twig',['DoctorForm'=>$form->createView()]);
    }


}
