<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $getExercises = $this->get('exercise.dashboard');

        $dashboardContent = $getExercises->getDashboardContent();

        return $this->render('default/index.html.twig', ['exercises' => $dashboardContent]);
    }
}
