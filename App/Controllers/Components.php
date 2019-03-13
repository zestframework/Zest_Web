<?php

namespace App\Controllers;
use Zest\View\View;

class Components extends \Zest\Controller\Controller
{

    public function add()
    {
        if ((new \Zest\Auth\User())->isLogin()) {
            view('components/add');
        } else {
            add_system_message('Sorry, you should login to create component project', 'error');
            redirect(site_base_url());
        }
    }
    
     public function addProcess()
    {
        if ((new \Zest\Auth\User())->isLogin()) {
            if (input('submit')) {
                $title = escape(input('title'));
                $cat = escape(input('cat'));
                $contents = escape(input('description'));
                $result = model('Components')->create($title,$cat,$contents);
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
         view('components/components',$args);
    }
    public function view()
    {
         if (input('submit')) {
            if (!model('Community')->isClose($slug)) {
                $slug = $this->route_params['slug'];
                $contents = escape(input('description'));
                $res = model('Community')->reply($slug,$contents);
                 redirect(site_base_url().'/components/view/' .$slug);
            } else {
                redirect(site_base_url().'/components/view/' .$slug);
            }     
         } elseif(input('close')) {
            $slug = $this->route_params['slug'];
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isClosed' => 'yes'],$id);
            redirect(site_base_url().'/components/view/' .$slug);
         } elseif(input('open')) {
            $slug = $this->route_params['slug'];
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isClosed' => 'no'],$id);
            redirect(site_base_url().'/components/view/' .$slug);
         } elseif(input('file')) {
            $slug = $this->route_params['slug'];
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $prevFile = model('Components')->componentWhere('slug',$slug)[0]['componentFile'];
            $version = escape(input('version'));
            $file = (new \Zest\Files\Files())->fileUpload( $_FILES['file'],'../Storage/Data/','zip');
            if ($file['status'] === 'success') {
                add_system_message("Component file uploaded successfully", 'success');
                unlink(route()->storage_data.'/'.$prevFile);
                $res = model('Community')->communityUpdate(['componentFile' => $file['code'],'componentVersion' => $version],$id);
            } else {
                add_system_message("Sorry, file not uploaded", 'error');
            }
            redirect(site_base_url().'/components/view/' .$slug);
         } elseif(input('delete') && (new \App\Models\Account)->isAdmin()) {
            $slug = $this->route_params['slug'];
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isDelete' => 'yes'],$id);
            redirect(site_base_url().'/components/1');
         } else {
             $slug = $this->route_params['slug'];
             if (model('Components')->isComponent($slug) !== 0) {
                $pages = model('Components')->componentWhere('slug',$slug);
                view('components/view',$pages[0],false);
             } else {
                view("errors/404");
             }
         }
    }     
}
