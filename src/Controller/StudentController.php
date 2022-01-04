<?php

namespace App\Controller;

use App\Entity\Student;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/student", name="student_")
     */
class StudentController extends AbstractController
{
    /**
     * @Route("/", name="show_all")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $students = $doctrine->getRepository(Student::class)->findAll();
        return $this->render('student/index.html.twig', [
            'students' => $students,
        ]);
    }
    /**
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        return $this->render('student/new.html.twig', [

        ]);
    }
}
