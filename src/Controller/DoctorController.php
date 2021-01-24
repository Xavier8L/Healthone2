<?php

namespace App\Controller;

use App\Entity\Recepten;
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
     * @Route("/doctor", name="Dhomepage")
     */
    public function homepage()
    {
        return $this ->render('doctor/Dhome.html.twig');
//        password:qwe123
    }

    /**
     * @Route("/doctor/creat", name="creatDM")
     */
    public function creat(EntityManagerInterface $em, Request $request)
    {
        $recept = new Recepten();
        $form = $this->createForm(ReceptType::class, $recept);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($recept);
            $em->flush();

            return $this->redirectToRoute("Doctormtable");
        }

        return $this->render('doctor/doctorCreate.html.twig',['DoctorForm'=>$form->createView()]);
    }

    /**
     * @Route("/doctor/medicijnen", name="Doctormtable")
     */

    public function DoctorMtable()
    {
        $repository =$this->getDoctrine()->getRepository(Recepten::class);
        $recepten =$repository->findAll();
        return $this->render('doctor/doctorMtable.html.twig',['recepten'=> $recepten]);
    }

    /**
     * @Route("doctor/update/{id}", name="updateDM")
     */
    public function updateD($id, Request $request)
    {
        $recept=$this->getDoctrine()->getRepository(Recepten::class)->find($id);
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($recept);
            $em->flush();

            $this->addFlash('success',"Medicijn is update");

            return $this->redirectToRoute("Doctormtable");
        }

        return $this->render('doctor/Dwijzigen.html.twig',['DoctorForm'=>$form->createView()]);

    }

    /**
     * @Route("doctoe/delet/{id}", name="deletDM")
     */
    public function deleteD($id)
    {
        $em=$this->getDoctrine()->getManager();
        $recept=$this->getDoctrine()->getRepository(Recepten::class)->find($id);
        $em->remove($recept);
        $em->flush();

        $this->addFlash('danger',"Medicijn is verwijden");


        return $this->redirectToRoute("Doctormtable");
    }


}
