<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;
use RR\Shunt\Parser;

class Arithmetic implements Worker {

    public function run($params = null)
    {
        return Parser::parse($params);
    }
}