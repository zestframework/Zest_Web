<?php

namespace App\Controllers;
use Zest\View\View;

class Community extends \Zest\Controller\Controller
{

    public function add()
    {
        if ((new \Zest\Auth\User())->isLogin()) {
            View::view('community/add');
        } else {
            View::view('errors/404');
        }
    }
    
     public function addProcess()
    {
        if (input('submit')) {
            $title = escape(input('title'));
            $cat = escape(input('cat'));
            $contents = escape(input('description'));
            $com = new \App\Models\Community();
            $result = $com->create($title,$cat,$contents);
            redirect(site_base_url().'community/1');
        }
    }   
    public function index()
    {
         $page = $this->route_params['page'];
         $args = ['page' => $page];
         View::view('community/community',$args);
    }
    public function view()
    {
         if (input('submit')) {
            $slug = $this->route_params['slug'];
            $contents = escape(input('description'));
            $res = (new \App\Models\Community)->reply($slug,$contents);
             redirect(site_base_url().'community/view/' .$slug);
         } elseif(input('close')) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Community)->communityWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Community::communityUpdate(['isClosed' => 'yes'],$id);
            redirect(site_base_url().'community/view/' .$slug);
         }elseif(input('open')) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Community)->communityWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Community::communityUpdate(['isClosed' => 'no'],$id);
            redirect(site_base_url().'community/view/' .$slug);
         } else {
             $slug = $this->route_params['slug'];
             if (( new \App\Models\Community)->isCommunity($slug) !== 0) {
                $pages = (new \App\Models\Community)->communityWhere('slug',$slug);
                View::view('community/view',$pages[0]);
             } else {
                View::View("errors/404");
             }
         }
    }     
}
