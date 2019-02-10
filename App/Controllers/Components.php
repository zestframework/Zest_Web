<?php

namespace App\Controllers;
use Zest\View\View;

class Components extends \Zest\Controller\Controller
{

    public function add()
    {
        if ((new \Zest\Auth\User())->isLogin()) {
            View::view('components/add');
        } else {
            View::view('errors/404');
        }
    }
    
     public function addProcess()
    {
        if ((new \Zest\Auth\User())->isLogin()) {
            if (input('submit')) {
                $title = escape(input('title'));
                $contents = escape(input('description'));
                $com = new \App\Models\Components();
                $result = $com->create($title,$contents);
                add_system_message("The component topic has been created", "success");
                redirect(site_base_url().'/components/1');
            }
        } else {
            add_system_message("You should be login, in order to create topic", "error");
            redirect(site_base_url()."/account/login");
        }    
    }   
    public function index()
    {
         $page = $this->route_params['page'];
         $args = ['page' => $page];
         View::view('components/components',$args);
    }
    public function view()
    {
         if (input('submit')) {
            if (!(new \App\Models\Community)->isClose($slug)) {
                $slug = $this->route_params['slug'];
                $contents = escape(input('description'));
                $res = (new \App\Models\Components)->reply($slug,$contents);
                 redirect(site_base_url().'/components/view/' .$slug);
            } else {
                redirect(site_base_url().'/components/view/' .$slug);
            }     
         } elseif(input('close')) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Components)->componentWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Components::componentUpdate(['isClosed' => 'yes'],$id);
            redirect(site_base_url().'/components/view/' .$slug);
         } elseif(input('open')) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Components)->componentWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Community::communityUpdate(['isClosed' => 'no'],$id);
            redirect(site_base_url().'/components/view/' .$slug);
         } elseif(input('file')) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Components)->componentWhere('slug',$slug)[0]['id'];
            $version = escape(input('version'));
            $file = (new \Zest\Files\Files())->fileUpload( $_FILES['file'],'../Storage/Data/','zip');
            $res = (new \App\Models\Community)->communityUpdate(['componentFile' => $file,'componentVersion' => $version],$id);
            redirect(site_base_url().'/components/view/' .$slug);
         }else {
             $slug = $this->route_params['slug'];
             if ((new \App\Models\Components)->isComponent($slug) !== 0) {
                $pages = (new \App\Models\Components)->componentWhere('slug',$slug);
                View::view('components/view',$pages[0],false);
             } else {
                View::View("errors/404");
             }
         }
    }     
}
