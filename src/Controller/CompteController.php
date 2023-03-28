<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(): Response
    {
        if (!$this->getUser()) {
            // si l'utilisateur est déjà connecté, redirigez-le vers la page de compte
            return $this->redirectToRoute('app_login');
        }
        $stylesheets = 'assets/css/bootstrap.min.css';
        return $this->render('compte/index.html.twig',[
            'stylesheets' => $stylesheets
        ]);
    }
}
