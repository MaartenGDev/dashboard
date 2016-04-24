<?php
use App\Core\Kernel;
use App\Http\Request;
require_once 'vendor/autoload.php';
$request = new Request();
new Kernel($request->Capture());


