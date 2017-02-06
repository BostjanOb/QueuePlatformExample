<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;

class SlowTask implements Worker
{
    public function run($params = null)
    {
        if (!is_numeric($params)) {
            throw new \InvalidArgumentException('Param should be numeric!');
        }

        sleep($params);
        return 'Completed';
    }
}
