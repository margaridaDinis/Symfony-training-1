<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use AppBundle\Entity\Exercise;

class ExerciseDashboard
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getDashboardContent()
    {
        $getExercises = $this->em->createQueryBuilder();

        $getExercises ->select("e")
            ->from("AppBundle:Exercise", "e")
            ->orderBy("e.date", "ASC");

        $exercises = $getExercises ->getQuery()->getResult();

        $today = date('Y-m-d');
        $oneWeekAgo = date("Y-m-d", strtotime("-1 week"));
        $twoWeeksAgo = date("Y-m-d", strtotime("-2 week"));

        $todayExercises = [];
        $oneWeekAgoExercises = [];
        $twoWeeksAgoExercises = [];

        foreach ($exercises as $ex){
            /** @var Exercise $ex */
            if ( $ex->getDate()->format('Y-m-d') === $twoWeeksAgo){
                $twoWeeksAgoExercises[] = $ex;
            }

            if ( $ex->getDate()->format('Y-m-d') === $oneWeekAgo ){
                $oneWeekAgoExercises[] = $ex;
            }

            if ( $ex->getDate()->format('Y-m-d') === $today ){
                $todayExercises[] = $ex;
            }
        }

        $sortedExercises = [
            "twoWeeksAgoExercises" => $twoWeeksAgoExercises,
            "oneWeekAgoExercises" => $oneWeekAgoExercises,
            "todayExercises" => $todayExercises
        ];

        return $sortedExercises;
    }
}