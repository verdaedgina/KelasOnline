<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$request = Illuminate\Http\Request::capture();
$app->make(Illuminate\Contracts\Http\Kernel::class)->handle($request)->send();
