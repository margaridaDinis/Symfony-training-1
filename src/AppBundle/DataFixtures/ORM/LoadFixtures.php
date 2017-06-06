<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }

    public function exercise()
    {
        $exerciseNames = [
            'Pull-ups',
            'Inverted rows',
            'Seated row',
            'Cable flys',
            'Face pulls',
            'Bulgarian split squat',
            'Weighted ab curl',
            'Dumbbell step up',
            'Dumbbell bench press',
            'Underhand lat pulldown',
            'Seated dumbbell curl',
            'Tricep pushdown'
        ];

        $key = array_rand($exerciseNames);
        return $exerciseNames[$key];
    }
}