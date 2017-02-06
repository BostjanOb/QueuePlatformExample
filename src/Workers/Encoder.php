<?php

namespace BostjanOb\QueuePlatformExample\Workers;

use BostjanOb\QueuePlatform\Worker;

class Encoder implements Worker
{
    public function run($params = null)
    {
        return password_hash($params, PASSWORD_BCRYPT);
    }
}
