<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RobofriendsController extends AbstractController
{
    /**
     * @Route("/robofriends", name="robofriends")
     */
    public function index()
    {
        return $this->render('robofriends/index.html.twig', [
            'controller_name' => 'RobofriendsController',
        ]);
    }
}
