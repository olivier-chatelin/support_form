<?php

namespace App\Controller;

use App\Entity\Curriculum;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/curriculum", name="show_all")
     */
class CurriculumController extends AbstractController
{
    /**
     * @Route("/new", name="show_all")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $curricula = $doctrine->getRepository(Curriculum::class)->findAll();
        return $this->render('curriculum/index.html.twig', [
            'curricula' => $curricula,
        ]);
    }
    /**
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        return $this->render('curriculum/new.html.twig', [

        ]);
    }
}
