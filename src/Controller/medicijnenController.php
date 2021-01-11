<?php

namespace App\Controller;


use App\Entity\Medicijnen;
use App\Form\MedicijnType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class medicijnenController extends AbstractController
{
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

            return $this->redirectToRoute("medewerkermtable");
        }

        return $this->render('verzeker/add.html.twig',['MedicijnForm'=>$form->createView()]);
    }

    /**
     * @Route("/medicijnen", name="mtable")
     */

    public function bezoekerMedicijnen()
    {
        $repository =$this->getDoctrine()->getRepository(Medicijnen::class);
        $medicijnen =$repository->findAll();
        return $this->render('Nomal/medicijnen.html.twig',['medicijnen'=> $medicijnen]);
    }

    /**
     * @Route("/medewerker", name="medewerkermtable")
     */
    public function verzekerMedicijnen()
    {
        $repository =$this->getDoctrine()->getRepository(Medicijnen::class);
        $medicijnen =$repository->findAll();
        return $this->render('verzeker/medicijnenlijst.html.twig',['medicijnen'=> $medicijnen]);
    }

    /**
     * @Route("medewerker/update/{id}", name="updateM")
     */
    public function updateM($id, Request $request)
    {
        $medicijn=$this->getDoctrine()->getRepository(Medicijnen::class)->find($id);
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->add('save',SubmitType::class,array('label'=>"aanpassen"));
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();

            return $this->redirectToRoute("medewerkermtable");
        }

        return $this->render('verzeker/add.html.twig',['MedicijnForm'=>$form->createView()]);

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

        return $this->redirectToRoute("medewerkermtable");
    }
}
