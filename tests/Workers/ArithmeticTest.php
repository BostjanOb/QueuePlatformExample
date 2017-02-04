<?php

class ArithmeticTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider reverseProvider
     */
    public function testCalc($formula, $result)
    {
        $worker = new \BostjanOb\QueuePlatformExample\Workers\Arithmetic();
        $this->assertEquals($result, $worker->run($formula));
    }

    public function reverseProvider()
    {
        return [
            ['3 + 4 * 2 / ( 1 - 5 ) ^ 2 ^ 3', 3.0001220703125],
            ['3*3', 9],
            ['3+3+3*3', 15],
            ['12-4', 8],
        ];
    }

}