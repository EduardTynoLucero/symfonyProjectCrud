<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use App\Security\LoginSuccessHandler;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
   

    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        

        if ($this->getUser()) {
            return $this->redirectToRoute('app_homepage'); // redirige a la página principal si el usuario ya ha iniciado sesión
        }
    
        $error = $authenticationUtils->getLastAuthenticationError();
        $nombre = $authenticationUtils->getLastUsername();
       // var_dump($nombre);
        return $this->render('security/login.html.twig', [
            'nombre' => $nombre,
            'error' => $error,
        ]);
    }
}