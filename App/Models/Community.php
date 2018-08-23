<?php

namespace App\Models;

use \Zest\Database\Db as Model;
use Config\Database;
use Zest\Auth\User;
use Config\Auth;
use Config\Email;
use Zest\Mail\Mail;
class Community extends Model
{   
    /* 
    * Store database name
    */
    protected static $db_name = Database::DB_NAME;
    /* 
    * Store database table name
    */
    protected static $db_tbl = 'community';
    
    public function create($title,$cat,$contents)
    {   
        
        $db = new Model;
        $created = date("Y-m-d H:i:s");
        $slug = \Zest\Site\Site::salts(7);
        $token = \Zest\Site\Site::salts(15);
        $result = $db->db()->insert(['table'=>static::$db_tbl,'db_name'=>static::$db_name,'columns' => [
            'ownerId' => (new User())->loginUser()[0]['id'],
            'title' => $title,
            'category' => $cat,
            'contents' => $contents,
            'created' => $created,
            'views' => 0,
            'slug' => $slug,
        ]]);
        $db->db()->close();
        return $result;
    }
    public function reply($slug,$contents)
    {   
        $db = new Model;
        $ownerId = $this->communityWhere('slug',$slug)[0]['ownerId'];
        $email = (new User())->getByWhere('id',$id)[0]['email'];
        $created = date("Y-m-d H:i:s");
        $token = \Zest\Site\Site::salts(15);
        $result = $db->db()->insert(['table'=>static::$db_tbl,'db_name'=>static::$db_name,'columns' => [
            'ownerId' => (new User())->loginUser()[0]['id'],
            'contents' => $contents,
            'created' => $created,
            'slug' => $slug,
        ]]);
        $mail = new Mail();
        $link = site_base_url() . "community/view/" . $slug;
        $html = "Dear {$email} Someone reply in your discussion topic<br><a href='{$link}'>topic</a><br>Click above link if you unable to open copy paste below link <br>{$link}";
        $mail->setSubject("Community topic");
        $mail->setSender(Email::SITE_EMAIL);
        $mail->setContentHTML($html);
        $mail->addReceiver($email);
        $mail->send();
        $db->db()->close();
        return $result;
    }    
    public function communityAll()
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'order_by'=> 'ID DESC','wheres' => ['title IS NOT NULL AND isComponent IS NULL']]);
        $db->db()->close();
        return $result;     
    }
    public function communityWhere($where,$value)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ["{$where} ="."'{$value}'" . 'AND title IS NOT NULL AND isComponent IS NULL'],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;
    }   
    public function isClose($slug)
    {
        $result = $this->communityWhere('slug',$slug);
        if ($result[0]['isClosed'] === 'yes') {
            return true;
        } else {
            return false;
        }
    }       
    public function communityReplies($slug)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ['slug ='."'{$slug}' AND title IS NULL AND isComponent IS NULL" ],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;        
    }
    public function viewLimitedCommunity($limit,$offset)
    {
        $db = new Model;
        $result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ['title IS NOT NULL AND isComponent IS NULL'],'limit' => ['start' => $limit , 'end' => $offset],'order_by'=> 'ID DESC']);
        $db->db()->close();
        return $result;     
    }    
    public function isCommunity($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ['slug ='."'{$slug}' AND title IS NOT NULL AND isComponent IS NULL"]]);
        $db->db()->close();
        return $result;
    }

    public function communityUpdate($params,$id)
    {
        $db = new Model;
        $update = $db->db()->update(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'columns'=>$params,'wheres'=>['id ='.$id]]);
        $db->db()->close();
        return $update;     
    }
}
