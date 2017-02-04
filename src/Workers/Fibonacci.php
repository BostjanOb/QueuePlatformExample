<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;

class Fibonacci implements Worker
{

    public function run($params = null)
    {
        return (int)round(pow((sqrt(5) + 1) / 2, $params) / sqrt(5) );
}
}