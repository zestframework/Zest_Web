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
         $slug = $this->route_params['slug'];
         if (input('submit')) {
            if (!model('Community')->isClose($slug)) {
                $slug = $this->route_params['slug'];
                $contents = escape(input('description'));
                $res = model('Community')->reply($slug,$contents);
                add_system_message('Your reply had been added', 'success');
                 redirect(site_base_url().'/components/view/' .$slug.'/1');
            } else {
                add_system_message('Sorry, this topic has been closed!', 'error');
                redirect(site_base_url().'/components/view/' .$slug.'/1');
            }     
         } elseif(input('close')) {
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isClosed' => 'yes'],$id);
            redirect(site_base_url().'/components/view/' .$slug.'/1');
         } elseif(input('open')) {
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isClosed' => 'no'],$id);
            redirect(site_base_url().'/components/view/' .$slug.'/1');
         } elseif(input('file')) {
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $version = escape(input('version'));
            $supportedVersion = escape(input('supportedVersion'));
            $file = (new \Zest\Files\Files())->fileUpload( $_FILES['file'], route()->storage_data,'zip');
            if ($file['status'] === 'success') {
                model('File')->add('com', $file['code'], $id, ['version' => $version, 'supportedVersion' => $supportedVersion]);
                add_system_message("Component file uploaded successfully", 'success');
            } else {
                add_system_message("Sorry, file not uploaded", 'error');
            }
            redirect(site_base_url().'/components/view/' .$slug.'/1');
         } elseif(input('delete') && (new \App\Models\Account)->isAdmin()) {
            $id = model('Components')->componentWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isDelete' => 'yes'],$id);
            redirect(site_base_url().'/components/1');
         } else {
             if (model('Components')->isComponent($slug) !== 0) {
                $page = $this->route_params['page'];
                $arg1 = ['page' => $page];
                $pages = model('Components')->componentWhere('slug',$slug);
                $args = array_merge($arg1, $pages[0]);
                view('components/view',$args,false);
             } else {
                view("errors/404");
             }
         }
    }     
}
