<?php

namespace App\Controller;

use App\Entity\Sweat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Sweat::class);
        $topSweats = $repository->findBy(['isTop' => true]);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'topSweats' => $topSweats
        ]);
    }
}
