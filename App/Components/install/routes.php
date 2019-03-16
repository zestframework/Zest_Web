<?php

//namespace required to define your component you can add many routes in one component as well
$namespace = "App\Components\install\Controllers";
//$com->get('install', "Home@index@{$namespace}");

$com->get('install', function(){echo "string";});