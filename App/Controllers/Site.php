<?php

namespace App\Controllers;

class Site extends \Zest\Controller\Controller
{
    public function terms()
    {
        view('site/terms'); 
    }
    public function privacy()
    {
        view('site/privacy'); 
    }
    public function contact()
    {
    	view('site/contact');
    }
}
