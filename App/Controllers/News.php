<?php

namespace App\Controllers;

use Zest\View\View;

class News extends \Zest\Controller\Controller
{

    public function index()
    {
         $page = $this->route_params['page'];
         $args = ['page' => $page];
         View::view('news/index',$args);
    }
    public function view()
    {
         $slug = $this->route_params['slug'];
         if (model('Pages')->isNews($slug) !== 0) {
            $pages = model('Pages')->pageWhere('slug',$slug);
            View::view('news/view',$pages[0],false);
         } else {
            View::View("errors/404");
         }
    }     
}
