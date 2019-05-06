<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $projects = json_decode(file_get_contents('https://nfq190418.realus.website/students.json'), true);

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
            'user' => $user
        ]);
    }
}
