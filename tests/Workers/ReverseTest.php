<?php

class ReverseTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider reverseProvider
     */
    public function testTextReverse($text, $result)
    {
        $worker = new \BostjanOb\QueuePlatformExample\Workers\Reverse();
        $this->assertEquals($result, $worker->run($text));
    }

    public function reverseProvider()
    {
        return [
            ['foo', 'oof'],
            ['bar', 'rab'],
            ['QueuePlatform Example', 'elpmaxE mroftalPeueuQ'],
            ['John Doe', 'eoD nhoJ'],
        ];
    }

}