<?php

namespace App\Controller;

use App\Entity\Campus;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/campus", name="campus_")
     */
class CampusController extends AbstractController
{
    /**
     * @Route("/new", name="show_all")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $campuses = $doctrine->getRepository(Campus::class)->findAll();
        return $this->render('campus/index.html.twig', [
            'campuses' => $campuses,
        ]);
    }
    /**
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        return $this->render('campus/new.html.twig', [

        ]);
    }
}
