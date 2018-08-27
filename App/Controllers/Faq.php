<?php

namespace App\Controllers;

use Zest\View\View;

class Faq extends \Zest\Controller\Controller
{

    public function faq()
    {
         $page = $this->route_params['page'];
         $args = ['page' => $page];
         View::view('faqs/faqs',$args);
    }
    public function view()
    {
         $slug = $this->route_params['slug'];
         if (\App\Models\Pages::isFaq($slug) !== 0) {
            $pages = \App\Models\Pages::pageWhere('slug',$slug);
            View::view('faqs/view',$pages[0],false);
         } else {
            View::View("errors/404");
         }
    }     
}
