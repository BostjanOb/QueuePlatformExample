<?php

require_once '../vendor/autoload.php';

$sqlLite = new \BostjanOb\QueuePlatform\Storage\SqlLiteStorage(__DIR__ . '/db.sqlite3');
$qm = new \BostjanOb\QueuePlatform\QueueManager($sqlLite);

$qm->registerWorker('reverse', new \BostjanOb\QueuePlatformExample\Workers\Reverse());
$qm->registerWorker('fibonacci', new \BostjanOb\QueuePlatformExample\Workers\Fibonacci());
$qm->registerWorker('arithmetic', new \BostjanOb\QueuePlatformExample\Workers\Arithmetic());
$qm->registerWorker('encoder', new \BostjanOb\QueuePlatformExample\Workers\Encoder());