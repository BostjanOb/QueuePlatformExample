<?php

class FibonnaciTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider fibonnaciProvider
     */
    public function testCalcFibonnaci($num, $result)
    {
        $worker = new \BostjanOb\QueuePlatformExample\Workers\Fibonacci();
        $this->assertEquals($result, $worker->run($num));
    }

    public function fibonnaciProvider()
    {
        return [
            [2, 1],
            [5, 5],
            [9, 34],
            [13, 233],
            [13, 233],
            [17, 1597],
            [34, 5702887]
        ];
    }

}