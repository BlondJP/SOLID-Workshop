<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/user/number")
     */
    public function numberAction()
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $numberOfUsers = count($repo->findAll());

        return new Response(
            '<html><body>Nombre d\'utilisateur: '.$numberOfUsers.'</body></html>'
        );
    }
}