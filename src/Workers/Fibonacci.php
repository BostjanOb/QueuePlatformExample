<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;

class Fibonacci implements Worker
{
    public function run($params = null)
    {
        if ( !is_numeric($params) ) {
            throw new \InvalidArgumentException('Param should be numeric!');
        }
        return (int)round(pow((sqrt(5) + 1) / 2, $params) / sqrt(5));
    }
}
