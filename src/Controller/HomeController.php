<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function home(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/log", name="log_home")
     */

    public function log_home(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('front/_userlogged.html.twig');
    }
}