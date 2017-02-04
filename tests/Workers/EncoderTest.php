<?php

class EncoderTest extends \PHPUnit\Framework\TestCase
{

    public function testEncodeText()
    {
        $encoder = new \BostjanOb\QueuePlatformExample\Workers\Encoder();
        $this->assertTrue(password_verify('queue_example', $encoder->run('queue_example')));
    }

}