<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index_web")
     */
    public function index()
    {
        return $this->render('Web/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
