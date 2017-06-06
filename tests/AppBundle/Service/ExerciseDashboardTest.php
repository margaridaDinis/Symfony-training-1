<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\ExerciseDashboard;

class ExerciseDashboardTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDashboardContent()
    {
        $stub = $this->getMockBuilder(ExerciseDashboard::class)
            ->setMethods(['getDashboardContent'])
            ->getMock();

//        TODO Figure out how to do this...

//        $stub->method('getDashboardContent')
//            ->willReturn('foo');
//
//        $this->assertEquals('foo', $stub->getDashboardContent());
    }
}