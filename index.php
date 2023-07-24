<?php

declare(strict_types=1);

require_once __DIR__ .'/vendor/autoload.php';

use Dotenv\Dotenv;

// LOADING ENV
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__.'/core/bootstrap.php';