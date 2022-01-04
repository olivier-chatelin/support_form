<?php

namespace App\Controller;

use App\Entity\Instructor;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/instructor", name="show_all")
     */
class InstructorController extends AbstractController
{
    /**
     * @Route("/new", name="show_all")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $instructors = $doctrine->getRepository(Instructor::class)->findAll();
        return $this->render('instructor/index.html.twig', [
            'instructors' => $instructors,
        ]);
    }
    /**
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        return $this->render('instructor/new.html.twig', [

        ]);
    }
}
