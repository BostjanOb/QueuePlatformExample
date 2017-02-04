<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;

class SlowTask implements Worker {

    public function run($params = null)
    {
        sleep(20);
        return 3;
    }
}