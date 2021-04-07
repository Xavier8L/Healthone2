<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AirportController extends AbstractController
{
    /**
     * @Route("/airport", name="airport")
     */
    public function index(): Response
    {
        return $this->render('airport/index.html.twig', [
            'controller_name' => 'AirportController',
        ]);
    }
}
