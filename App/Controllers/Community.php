<?php

namespace App\Controllers;

class Community extends \Zest\Controller\Controller
{

    public function add()
    {
        if ((new \Zest\Auth\User())->isLogin()) {
            view('community/add');
        } else {
            add_system_message("Sorry, you should login to add topic in discussion", 'error');
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
				$result = model('Community')->create($title,$cat,$contents);
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
         view('community/community',$args);
    }
    public function view()
    {
        $slug = $this->route_params['slug'];
         if (input('submit')) {
            if ((new \Zest\Auth\User())->isLogin()) {
    			if (!model('Community')->isClose($slug)) {
    				$contents = escape(input('description'));
    				$res = model('Community')->reply($slug,$contents);
                    add_system_message("You reply, had been added", 'success');
    				redirect(site_base_url().'/community/view/' .$slug.'/1');
    			} else {
                    add_system_message('Sorry, this topic has been closed!', 'error');
    				redirect(site_base_url().'/community/view/' .$slug.'/1');
    			}
             } else {
                add_system_message("You should be login, in order to reply in any topic", "error");
                redirect(site_base_url()."/account/login");
             }   
         } elseif(input('close') && (new \App\Models\Account)->isAdmin()) {
            $id = model('Community')->communityWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isClosed' => 'yes'],$id);
            redirect(site_base_url().'/community/view/' .$slug.'/1');
         } elseif(input('open') && (new \App\Models\Account)->isAdmin()) {
            $id = model('Community')->communityWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isClosed' => 'no'],$id);
            redirect(site_base_url().'/community/view/' .$slug.'/1');
         } elseif(input('delete') && (new \App\Models\Account)->isAdmin()) {
            $id = model('Community')->communityWhere('slug',$slug)[0]['id'];
            $res = model('Community')->communityUpdate(['isDelete' => 'yes'],$id);
            redirect(site_base_url().'/community/1');
         } else {
             if (model('Community')->isCommunity($slug) !== 0) {
                $page = $this->route_params['page'];
                $arg1 = ['page' => $page];
                $pages = model('Community')->communityWhere('slug',$slug);
                $args = array_merge($arg1, $pages[0]);

                view('/community/view',$args,false);
             } else {
                view("errors/404");
             }
         }
    }     
}
