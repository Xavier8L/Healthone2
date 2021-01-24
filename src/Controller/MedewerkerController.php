<?php

namespace App\Controller;

use App\Entity\Medicijnen;
use App\Entity\Patienten;
use App\Form\MedicijnType;
use App\Form\PatientenType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedewerkerController extends AbstractController
{

    /**
     * @Route("/medewerker", name="Mhomepage")
     */
    public function homepage()
    {
        return $this ->render('medewerker/Mhome.html.twig');
//        password:qwe123
    }


    /**
     * @Route("/medewerker/medicijnen", name="medewerkermtable")
     */
    public function MedicijnenTable()
    {
        $repository =$this->getDoctrine()->getRepository(Medicijnen::class);
        $medicijnen =$repository->findAll();
        return $this->render('medewerker/medicijnenlijst.html.twig',['medicijnen'=> $medicijnen]);
    }

    /**
     * @Route("/medewerker/creat", name="creatM")
     */
    public function creat(EntityManagerInterface $em, Request $request)
    {
        $medicijn = new Medicijnen();
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();

            $this->addFlash('success',"Medicijn is gemaakt");

            return $this->redirectToRoute("medewerkermtable");
        }

        return $this->render('medewerker/create.html.twig',['MedicijnForm'=>$form->createView()]);
    }

    /**
     * @Route("medewerker/update/{id}", name="updateM")
     */
    public function updateM($id, Request $request)
    {
        $medicijn=$this->getDoctrine()->getRepository(Medicijnen::class)->find($id);
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();

            $this->addFlash('success',"Medicijn is update");

            return $this->redirectToRoute("medewerkermtable");
        }

        return $this->render('medewerker/Mwijzigen.html.twig',['MedicijnForm'=>$form->createView()]);

    }

    /**
     * @Route("medewerker/delet/{id}", name="deletM")
     */
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $medicijn=$this->getDoctrine()->getRepository(Medicijnen::class)->find($id);
        $em->remove($medicijn);
        $em->flush();

        $this->addFlash('danger',"Medicijn is verwijden");


        return $this->redirectToRoute("medewerkermtable");
    }


    /**
     * @Route("/medewerker/patienten", name="medewerkerptable")
     */

    public function PatientenTable()
    {
        $repository =$this->getDoctrine()->getRepository(Patienten::class);
        $patient =$repository->findAll();
        return $this->render('medewerker/patientenlijst.html.twig',['patienten'=> $patient]);
    }

    /**
     * @Route("/medewerker/creatP", name="creatP")
     */
    public function Pcreat(EntityManagerInterface $em, Request $request)
    {
        $patient = new Patienten();
        $form = $this->createForm(PatientenType::class, $patient);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();

            $this->addFlash('success',"Patient is gemaakt");

            return $this->redirectToRoute("medewerkerptable");
        }

        return $this->render('medewerker/Pcreate.html.twig',['PatientenForm'=>$form->createView()]);
    }

    /**
     * @Route("medewerker/updateP/{id}", name="updateP")
     */
    public function updateP($id, Request $request)
    {
        $medicijn=$this->getDoctrine()->getRepository(Patienten::class)->find($id);
        $form = $this->createForm(PatientenType::class, $medicijn);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();

            $this->addFlash('success',"Patient is update");

            return $this->redirectToRoute("medewerkerptable");
        }

        return $this->render('medewerker/Pwijzigen.html.twig',['PatientenForm'=>$form->createView()]);

    }

    /**
     * @Route("medewerker/deletP/{id}", name="deletP")
     */
    public function deleteP($id)
    {
        $em=$this->getDoctrine()->getManager();
        $patient=$this->getDoctrine()->getRepository(Patienten::class)->find($id);
        $em->remove($patient);
        $em->flush();

        $this->addFlash('danger',"Patient is verwijden");


        return $this->redirectToRoute("medewerkerptable");
    }
}
