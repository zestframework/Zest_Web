<?php

namespace App\Controllers;
use Zest\View\View;
use Zest\Auth\Auth;
use Zest\Auth\User;

class Admin extends \Zest\Controller\Controller
{
  
    public function index()
    {
        View::view('admin/admin');
    }

    public function users()
    {
        view('admin/users/view');
    }

    public function userViewId()
    {
        if (input('edit') || input('ty') || input('status')) {
            if (input('edit')) {
                $id = input('id');
                $name = escape(input('name'));
                $auth = new Auth;
                $auth->update()->update(['name'=>$name],$id);
                redirect(site_base_url()."/admin/view/user/{$id}");
            }
            if (input('ty')) {
                $id = input('id');
                $role = input('role');
                $auth = new Auth;
                $auth->update()->update(['role'=>$role],$id);
                redirect(site_base_url()."/admin/view/user/{$id}");
            }
            if (input('status')) {
                $id = input('id');
                $status = input('st');
                $auth = new Auth;
                $auth->update()->update(['status'=>$status],$id);
                redirect(site_base_url()."/admin/view/user/{$id}");                
            }
        } else {
            $id = $this->route_params['id'];
            $user = new User;
            $users = $user->getByWhere('id',$id);
            view("admin/users/viewId",$users[0],false);
        }
    }   
    public function siteSetting()
    {
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
        if (input("page")) {
            $title = escape(input('title'));
            $keyword = escape(input('keyword'));
            $shortContent = escape(input('scontent'));
            $type = escape(input('type'));
            $content = $this->cleanPages(input('contents'));
            $files = new \Zest\Files\Files();
            $dir = "../Storage/Data/";
            $files->mkdir($dir."Blogs/");
            $target = "../Storage/Data/Blogs/";
            $file = $files->fileUpload($_FILES['image'],$target,'image');
            if ($file['status'] === 'success') {
                $fileSalts = "Blogs/".$file['code'];
            } else {
                $fileSalts = '';
            }
            $result = \App\Models\Pages::pageCreate($title,$keyword,$shortContent,$type,$content,$fileSalts);
            redirect(site_base_url()."/admin/page/view");
        } else {
            View::view("admin/pageAdd");
        }
    }
    public function pageView()
    {
        View::view("admin/pageView");
    }
    public function pageViewId()
    {
        if (input('edit') || input('ty') || input('img')) {
            if (input('edit')) {
                $id = input('id');
                $title = escape(input('title'));
                $keyword = escape(input('keyword'));
                $shortContent = escape(input('scontent'));
                $content = input('contents');
                $result = \App\Models\Pages::pageUpdate(['title'=>$title,'keyword' => $keyword,'scontent'=>$shortContent,'content'=>$content,'updated'=>date("Y-m-d H:i:s")],$id);
                redirect(site_base_url()."/admin/view/page/{$id}");
            }
            if (input('ty')) {
                $id = input('id');
                $type = input('type');
                $result = \App\Models\Pages::pageUpdate(['type'=>$type,'updated'=>date("Y-m-d H:i:s")],$id);
                redirect(site_base_url()."/admin/view/page/{$id}");
            }
            if (input('img')) {
                $id = input('id');
                $files = new \Zest\Files\Files();
                $dir = "../Storage/Data/";
                $files->mkdir($dir."Blogs/");
                $target = "../Storage/Data/Blogs/";
                $file = $files->fileUpload($_FILES['image'],$target,'image');
                if ($file['status'] === 'success') {
                    $fileSalts = "Blogs/".$file['code'];
                } else {
                    $fileSalts = '';
                }                
                $result = \App\Models\Pages::pageUpdate(['image'=>$fileSalts,'updated'=>date("Y-m-d H:i:s")],$id);
                redirect(site_base_url()."/admin/view/page/{$id}");
            }
        } else {
            $id = $this->route_params['id'];
            $page = \App\Models\Pages::pageWhere("id",$id);
            View::view("admin/pageViewId",$page[0],false);
        }
    }
    public function sendMails()
    {
        if (input('submit')) {
            $sub = input('sub');
            $msg = input('msg');
            $users = (new \Zest\Auth\User)->getAll();
            foreach ($users as $key => $value) {
                model("Mailer")->send($value['email'],$sub,$msg);
            }
           redirect(site_base_url().'/admin/send/mail');
        } else {
            View::view('admin/sendMail');
        }
    }


    public function generateSiteMap()
    {
            $url = site_base_url().'/';
            $url = str_replace(":443", '', $url);
            $root = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
        '. "<url><loc>{$url}site/terms</loc></url><url><loc>{$url}site/privacy</loc></url><url><loc>{$url}contribute/index</loc></url><url><loc>{$url}contribute/donate</loc></url>
        <url><loc>{$url}account/reset-password</loc></url>
        
        ";
        $fh = fopen("../public_html/sitemap.xml", "w");
        fwrite($fh, $root);
        $topics = (new \App\Models\Community)->communityAll();
        $components = (new \App\Models\Components)->componentAll();
        $blogs = (new \App\Models\Pages)->pageWhere('type','blog');
        $faqs = (new \App\Models\Pages)->pageWhere('type','faq');
        $news = (new \App\Models\Pages)->pageWhere('type','news');    
        $users = (new \Zest\Auth\User)->getAll();  
		$blogsCount = ceil(count($blogs) / 6);	
		for ($i = 1; $i <= $blogsCount; $i++) {
               $links =  "<url><loc>".$url."blogs/".$i."</loc></url>";
                fwrite($fh, $links);			
		}
		$topicsCount = ceil(count($topics) / 6);	
		for ($i = 1; $i <= $topicsCount; $i++) {
               $links =  "<url><loc>".$url."community/".$i."</loc></url>";
                fwrite($fh, $links);			
		}	
		$componentsCount = ceil(count($components) / 6);	
		for ($i = 1; $i <= $componentsCount; $i++) {
               $links =  "<url><loc>".$url."components/".$i."</loc></url>";
                fwrite($fh, $links);			
		}		
		$faqsCount = ceil(count($faqs) / 6);	
		for ($i = 1; $i <= $faqsCount; $i++) {
               $links =  "<url><loc>".$url."faqs/".$i."</loc></url>";
                fwrite($fh, $links);			
		}
		$newsCount = ceil(count($news) / 6);	
		for ($i = 1; $i <= $newsCount; $i++) {
               $links =  "<url><loc>".$url."news/".$i."</loc></url>";
                fwrite($fh, $links);			
		}		
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
        foreach ($news as $new => $value) {
               $links =  "<url><loc>".$url."news/view/".$value['slug']. '/' .  urlencode($value['title'])  ."</loc></url>";
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
    
    public function cleanPages($input)
    {
        if (!empty($input))
             return trim(htmlspecialchars($input, ENT_QUOTES));
    }
}
