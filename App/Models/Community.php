<?php

namespace App\Models;

use \Zest\Database\Db as Model;
use Zest\Auth\User;

class Community extends Model
{   

    protected $db_name;
    protected $db_tbl = 'community';
    
    public function __construct()
    {
        $this->db_name = __config()->database->db_name;
    }

    public function create($title,$cat,$contents)
    {   
        
        $db = new Model;
        $created = date("Y-m-d H:i:s");
        $slug = \Zest\Site\Site::salts(7);
        $token = \Zest\Site\Site::salts(15);
        $result = $db->db()->insert(['table'=>$this->db_tbl,'db_name'=>$this->db_name,'columns' => [
            'ownerId' => (new User())->loginUser()[0]['id'],
            'title' => $title,
            'category' => $cat,
            'contents' => $contents,
            'created' => $created,
            'views' => 0,
            'slug' => $slug,
        ]]);
        $email = (new User())->loginUser()[0]['email'];
        $link = site_base_url() . "/community/view/" . $slug;
        $html = "Dear {$email} your discussion topic has been created<br><a href='{$link}'>My Topic</a><br>Click above link if you unable to open copy paste below link <br>{$link}";
        model("Mailer")->send($email,"Community topic created", $html);   
        $db->db()->close();
        return $result;
    }
    public function reply($slug,$contents)
    {   
        $db = new Model;
        $ownerId = $this->communityWhere('slug',$slug)[0]['ownerId'];
        $created = date("Y-m-d H:i:s");
        $token = \Zest\Site\Site::salts(15);
        $result = $db->db()->insert(['table'=>$this->db_tbl,'db_name'=>$this->db_name,'columns' => [
            'ownerId' => (new User())->loginUser()[0]['id'],
            'contents' => $contents,
            'created' => $created,
            'slug' => $slug,
        ]]);
        $email = (new User())->getByWhere('id',$ownerId)[0]['email'];
        $link = site_base_url() . "/community/view/" . $slug;
        $html = "Dear {$email} Someone reply in your discussion topic<br><a href='{$link}'>topic</a><br>Click above link if you unable to open copy paste below link <br>{$link}";
        model("Mailer")->send($email,"Community topic reply", $html); 
        $db->db()->close();
        return $result;
    }    
    public function communityAll()
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'order_by'=> 'ID DESC','wheres' => ['title IS NOT NULL AND isComponent IS NULL AND isDelete IS NULL']]);
        $db->db()->close();
        return $result;     
    }
    public function communityWhere($where,$value)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ["{$where} ="."'{$value}'" . 'AND title IS NOT NULL AND isComponent IS NULL AND isDelete IS NULL'],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;
    }   

    /**
     * @bug? not working.
    */
    public function viewLimitedCommunityByUser($limit,$offset, $ownerId)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres ' => ["ownerId = $ownerId".' title IS NOT NULL AND isComponent IS NULL AND isDelete IS NULL '],'limit' => ['start' => $limit , 'end' => $offset],'order_by'=> 'ID DESC ', 'debug' => 'on']);
        $db->db()->close();
        return $result;     
    }    

    public function isClose($slug)
    {
        $result = $this->communityWhere('slug',$slug);
        //if ($result[0]['isClosed'] === 'yes') {
           // return true;
       // /} else {
            return false;
        //}
    }       
    public function communityReplies($slug)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['slug ='."'{$slug}' AND title IS NULL AND isComponent IS NULL AND isDelete IS NULL" ],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;        
    }
    
    public function limitedCommunityReplies($limit,$offset, $slug)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['slug ='."'{$slug}'". ' AND title IS NULL AND isComponent IS NULL AND isDelete IS NULL'],'limit' => ['start' => $limit , 'end' => $offset],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    }

    public function viewLimitedCommunity($limit,$offset)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['title IS NOT NULL AND isComponent IS NULL AND isDelete IS NULL'],'limit' => ['start' => $limit , 'end' => $offset],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    }    

    public function isCommunity($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'wheres' => ['slug ='."'{$slug}' AND title IS NOT NULL AND isComponent IS NULL AND isDelete IS NULL"]]);
        $db->db()->close();
        return $result;
    }

    public function communityUpdate($params,$id)
    {
        $db = new Model;
        $update = $db->db()->update(['db_name'=>$this->db_name,'table'=>$this->db_tbl,'columns'=>$params,'wheres'=>['id ='.$id]]);
        $db->db()->close();
        return $update;     
    }
}
