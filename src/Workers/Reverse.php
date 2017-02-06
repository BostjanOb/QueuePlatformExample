<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;

class Reverse implements Worker
{
    public function run($params = null)
    {
        return strrev($params);
    }
}
