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
		if ((new \Zest\Auth\User())->isLogin()) {
			if (input('submit')) {
				$title = escape(input('title'));
				$cat = escape(input('cat'));
				$contents = escape(input('description'));
				$com = new \App\Models\Community();
				$result = $com->create($title,$cat,$contents);
                add_system_message("The topic has been created", "success");
				redirect(site_base_url().'/community/1');
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
         View::view('community/community',$args);
    }
    public function view()
    {
         if (input('submit')) {
            if ((new \Zest\Auth\User())->isLogin()) {
                $slug = $this->route_params['slug'];
    			if (!(new \App\Models\Community)->isClose($slug)) {
    				$contents = escape(input('description'));
    				$res = (new \App\Models\Community)->reply($slug,$contents);
                    add_system_message("You reply, had been added", 'success');
    				redirect(site_base_url().'/community/view/' .$slug);
    			} else {
    				redirect(site_base_url().'/community/view/' .$slug);
    			}
             } else {
                add_system_message("You should be login, in order to reply in any topic", "error");
                redirect(site_base_url()."/account/login");
             }   
         } elseif(input('close') && (new \App\Models\Account)->isAdmin()) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Community)->communityWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Community::communityUpdate(['isClosed' => 'yes'],$id);
            redirect(site_base_url().'/community/view/' .$slug);
         } elseif(input('open') && (new \App\Models\Account)->isAdmin()) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Community)->communityWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Community::communityUpdate(['isClosed' => 'no'],$id);
            redirect(site_base_url().'/community/view/' .$slug);
         } elseif(input('delete') && (new \App\Models\Account)->isAdmin()) {
            $slug = $this->route_params['slug'];
            $id = (new \App\Models\Community)->communityWhere('slug',$slug)[0]['id'];
            $res = \App\Models\Community::communityUpdate(['isDelete' => 'yes'],$id);
            redirect(site_base_url().'/community/1');
         } else {
             $slug = $this->route_params['slug'];
             if (( new \App\Models\Community)->isCommunity($slug) !== 0) {
                $pages = (new \App\Models\Community)->communityWhere('slug',$slug);
                View::view('/community/view',$pages[0],false);
             } else {
                View::View("errors/404");
             }
         }
    }     
}
