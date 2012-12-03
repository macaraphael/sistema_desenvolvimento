<?php
require 'libraries/core/core.php';

function __autoload($classname){
    $filename = SDIRECTORY.'/libraries/'.$classname.'/'.$classname.'.php';
    include $filename;
}

$logs    = new logs;
$secrity = new secrity;
$toke    = new toke();
$cache   = new cache();