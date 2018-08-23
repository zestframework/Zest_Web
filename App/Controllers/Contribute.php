<?php

namespace App\Controllers;

//for using View
use Zest\View\View;

class Contribute extends \Zest\Controller\Controller
{
    public function index()
    {
        echo View::view('contribute/index');
    }
    public function donation()
    {
        echo View::view('contribute/donation');
    }
}
