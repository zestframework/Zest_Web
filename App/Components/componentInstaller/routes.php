<?php

//namespace required to define your component you can add many routes in one component as well
$namespace = "App\Components\componentInstaller\Controllers";


$com->add('com/installer/login', ['controller' => 'Account', 'action' => 'index', 'namespace'=>$namespace]);
$com->add('com/installer/installed', ['controller' => 'Home', 'action' => 'index', 'namespace'=>$namespace]);