<?php

namespace App\Models;

use \Zest\Database\Db as Model;
use Config\Database;
use Zest\Auth\User;
class Pages extends Model
{   
    /* 
    * Store database name
    */
    protected $db_name;
    /* 
    * Store database table name
    */
    protected $db_tbl = 'pages';
    
    public function __construct()
    {
        $this->db_name = __config()->database->db_name;
    }

    public function pageCreate($title,$keyword,$shortContent,$type,$content,$est,$file)
    {   
        
        $db = new Model;
        $created = date("Y-m-d H:i:s");
        $slug = \Zest\Site\Site::salts(7);
        $token = \Zest\Site\Site::salts(15);
        $result = $db->db()->insert(['table'=>$this->db_tbl,'db_name'=>$this->db_name,'columns' => [
            'ownerId' => (new User())->loginUser()[0]['id'],
            'title' => $title,
            'type' => $type,
            'keyword' => $keyword,
            'scontent' => $shortContent,
            'content' => $content,
            'created' => $created,
            'updated' => $created,
            'views' => 0,
            'isDelete' => null,
            'slug' => $slug,
            'token' => $token,
            'image' => $file,
            'est'   => $est,
        ]]);
        $db->db()->close();
        return $result;
    }
    public function pageAll()
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    }
    public function pageWhere($where,$value)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ["{$where} ="."'{$value}'"],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;
    }   
    public function viewLimitedPagesBlog($limit,$offset)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'limit' => ['start' => $limit , 'end' => $offset],'wheres'=> ['type ='."'blog'"],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    } 
    public function viewLimitedPagesfaq($limit,$offset)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'limit' => ['start' => $limit , 'end' => $offset],'wheres'=> ['type ='."'faq'"],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    }       
    public function isBlog($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['slug ='."'{$slug}' AND type = 'blog'"]]);
        $db->db()->close();
        return $result;
    }
    public function isFaq($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['slug ='."'{$slug}' AND type = 'faq'"]]);
        $db->db()->close();
        return $result;
    }    
    public function viewLimitedPagesNews($limit,$offset)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'limit' => ['start' => $limit , 'end' => $offset],'wheres'=> ['type ='."'news'"],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    }       
    public function isNews($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['slug ='."'{$slug}' AND type = 'news'"]]);
        $db->db()->close();
        return $result;
    }      
    public function pageUpdate($params,$id)
    {
        $db = new Model;
        $update = $db->db()->update(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'columns'=>$params,'wheres'=>['id ='.$id]]);
        $db->db()->close();
        return $update;     
    }

    public function readingTime($contents)
    {
        $word = str_word_count($contents);
        $m = floor($word / 250);
        $s = floor($word % 250 / (250 / 60));
        $est = $m >= 1 ? $m. ' min ' : ' ';
        $est .= $s >= 1 ? $s .' sec' : ' ';
        return $est;
    }
}
