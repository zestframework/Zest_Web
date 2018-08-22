<?php

namespace App\Controllers;
use Zest\View\View;

class Site extends \Zest\Controller\Controller
{

    public function terms()
    {
        View::view("site/terms"); 
    }
    public function privacy()
    {
        View::view("site/privacy"); 
    }     
}
