<?php

namespace App\Controllers;
use Zest\View\View;
use Zest\Auth\Auth;
use Zest\Auth\User;

class Admin extends \Zest\Controller\Controller
{
    public function isAdmin(){
         $user = new User;
        if (!$user->isLogin() || $user->loginUser()[0]['role'] !== 'admin') {
            redirect(site_base_url());
        }     
    }    
    public function index()
    {
        self::isAdmin();
        View::view('admin/admin');
    }
    /*
    public function usersList()
    {
        self::isAdmin();
        View::view("admin/userList");
    }
    public function userBanned()
    {
        self::isAdmin();
        View::view("admin/userBanned");
    }
    public function userAdd()
    {
        self::isAdmin();
       if (input("submit")) {
            $name = escape(input('name'));
            $username = escape(input('username'));
            $email = escape(input('email'));
            $password = escape(input('password'));
            $confirm = $password;
            $role = escape(input('status'));
            \App\Models\Account::signup($name,$username,$email,$password,$confirm,$role);
            header("Location:".site_base_url()."admin/list/users");
       } else {
            View::view("admin/userAdd");
       } 
    }
    public function userView()
    {
        self::isAdmin();
        if (input('edit') || input('ban') || input('unban') || input('close') || input('open') || input('role')){
            if (input('ban')) {
                $id = input('id');
                $ban = "banned";
                \App\Models\Account::updateUser(['ban'=>$ban],$id);
                header("Location:".site_base_url()."admin/user/view/{$id}");                
            }
            if (input('unban')) {
                $id = input('id');
                $unban = "NULL";
                \App\Models\Account::updateUser(['ban'=>$unban],$id);
                header("Location:".site_base_url()."admin/user/view/{$id}");                
            }    
            if (input('close')) {
                $id = input('id');
                $close = "closed";
                \App\Models\Account::updateUser(['close'=>$close],$id);
                header("Location:".site_base_url()."admin/user/view/{$id}");                
            }
            if (input('open')) {
                $id = input('id');
                $open = "NULL";
                \App\Models\Account::updateUser(['close'=>$open],$id);
                header("Location:".site_base_url()."admin/user/view/{$id}");                
            }                      
            if (input("role")) {
                $id = input('id');
                $status = input("type");
                \App\Models\Account::updateUser(['role'=>$status],$id);
                header("Location:".site_base_url()."admin/user/view/{$id}");
            }
            if (input('edit')){
                $id = input('id');
                $name = escape(input('name'));
                $username = escape(input('username'));
                $email = escape(input('email'));
                \App\Models\Account::updateUser(['name'=>$name,'username'=>$username,'email'=>$email],$id);
                header("Location:".site_base_url()."admin/user/view/{$id}");                                
            }
        } else {
            $id = $this->route_params['id'];
            $user = \App\Models\Account::userWhere('id',$id);
            View::view("admin/userView",$user[0]);
        }
    } 
    public function userClosed()
    {
        self::isAdmin();
        View::view("admin/userClosed");
    }
    */
    public function siteSetting()
    {
        self::isAdmin();
        if (input('status') || input('site')) {
            if (input('status')) {
                $status = input('type');
                \App\Models\Site::siteUpdate($status,1);
                header("Location:".site_base_url()."/admin/site/setting");
            }
            if (input('site')) {
                $name = escape(input('name'));
                $email = escape(input('email'));
                $description = escape(input('description'));
                $keyword = escape(input('keyword'));
                $gmeta = escape(input('gmeta'));
                \App\Models\Site::siteUpdate($name,2);
                \App\Models\Site::siteUpdate($email,3);
                \App\Models\Site::siteUpdate($description,4);
                \App\Models\Site::siteUpdate($keyword,5);
                \App\Models\Site::siteUpdate($gmeta,6);
                header("Location:".site_base_url()."/admin/site/setting");
            }
        } else {
            View::view("admin/siteSetting");
        }
    }
    public function pageAdd(){
        self::isAdmin();
        if (input("page")) {
            $title = escape(input('title'));
            $keyword = escape(input('keyword'));
            $shortContent = escape(input('scontent'));
            $type = escape(input('type'));
            $content = escape(input('contents'));
            $result = \App\Models\Pages::pageCreate($title,$keyword,$shortContent,$type,$content);
            redirect(site_base_url()."/admin/page/view");
        } else {
            View::view("admin/pageAdd");
        }
    }
    public function pageView()
    {
        self::isAdmin();
        View::view("admin/pageView");
    }
    public function pageViewId()
    {
        self::isAdmin();
        if (input('edit') || input('ty')) {
            if (input('edit')) {
                $id = input('id');
                $title = escape(input('title'));
                $keyword = escape(input('keyword'));
                $shortContent = escape(input('scontent'));
                $content = escape(input('contents'));
                $result = \App\Models\Pages::pageUpdate(['title'=>$title,'keyword' => $keyword,'scontent'=>$shortContent,'content'=>$content,'updated'=>time()],$id);
                redirect(site_base_url()."/admin/view/page/{$id}");
            }
            if (input('ty')) {
                $id = input('id');
                $type = input('type');
                $result = \App\Models\Pages::pageUpdate(['type'=>$type,'updated'=>time()],$id);
                redirect("Location:".site_base_url()."/admin/view/page/{$id}");
            }
        } else {
            $id = $this->route_params['id'];
            $page = \App\Models\Pages::pageWhere("id",$id);
            View::view("admin/pageViewId",$page[0],false);
        }
    }
    public function generateSiteMap()
    {
            $url = site_base_url().'/';
            $url = str_replace(":443", '', $url);
            $root = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
        '. "<url><loc>$url</loc></url><url><loc>{$url}blogs/1</loc></url><url><loc>{$url}community/1</loc></url><url><loc>{$url}Components/1</loc></url><url><loc>{$url}site/terms</loc></url><url><loc>{$url}site/privacy</loc></url><url><loc>{$url}faqs/1</loc></url><url><loc>{$url}contribute/index</loc></url><url><loc>{$url}contribute/donate</loc></url>
        ";
        $fh = fopen("../public_html/sitemap.xml", "w");
        fwrite($fh, $root);
        $topics = (new \App\Models\Community)->communityAll();
        $components = (new \App\Models\Components)->componentAll();
        $blogs = (new \App\Models\Pages)->pageWhere('type','blog');
        $faqs = (new \App\Models\Pages)->pageWhere('type','faq');  
        $users = (new \Zest\Auth\User)->getAll();     
        foreach ($topics as $topic => $value) {
               $links =  "<url><loc>".$url."community/view/".$value['slug']."</loc></url>";
                fwrite($fh, $links);
        }
        foreach ($components as $component => $value) {
               $links =  "<url><loc>".$url."components/view/".$value['slug']."</loc></url>";
                fwrite($fh, $links);
        } 
        foreach ($blogs as $blog => $value) {
               $links =  "<url><loc>".$url."blog/view/".$value['slug'] . '/' .urlencode($value['title']) . "</loc></url>";
                fwrite($fh, $links);
        }   
        foreach ($faqs as $faq => $value) {
               $links =  "<url><loc>".$url."faq/view/".$value['slug']. '/' .  urlencode($value['title'])  ."</loc></url>";
                fwrite($fh, $links);
        }        
        foreach ($users as $faq => $value) {
               $links =  "<url><loc>".$url."@".$value['username']."</loc></url>";
                fwrite($fh, $links);
        }                            
        $endroot = "</urlset>";
        fwrite($fh, $endroot);
        redirect($url."admin/home");
    }
}
