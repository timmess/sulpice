<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CharacterProfileController extends AbstractController
{
    /**
     * @Route("/character/profile/{id}", name="character_profile")
     */
    public function index(User $user): Response
    {
        return $this->render('character_profile/index.html.twig', [
            "user" => $user
        ]);
    }
}
