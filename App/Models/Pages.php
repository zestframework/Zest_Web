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
	protected static $db_name = Database::DB_NAME;
	/* 
	* Store database table name
	*/
	protected static $db_tbl = 'pages';
	
	public function pageCreate($title,$keyword,$shortContent,$type,$content,$file)
	{	
		
		$db = new Model;
        $created = date("Y-m-d H:i:s");
		$slug = \Zest\Site\Site::salts(7);
		$token = \Zest\Site\Site::salts(15);
		$result = $db->db()->insert(['table'=>static::$db_tbl,'db_name'=>static::$db_name,'columns' => [
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
		]]);
		$db->db()->close();
		return $result;
	}
	public function pageAll()
	{
    	$db = new Model;
		$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'order_by'=> 'ID DESC']);
		$db->db()->close();
		return $result;		
	}
    public function pageWhere($where,$value)
    {
    	$db = new Model;
    	$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ["{$where} ="."'{$value}'"],'order_by'=> 'ID DESC']);
    	$db->db()->close();
    	return $result;
    }  	
    public function viewLimitedPagesBlog($limit,$offset)
    {
    	$db = new Model;
    	$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'limit' => ['start' => $limit , 'end' => $offset],'wheres'=> ['type ='."'blog'"],'order_by'=> 'ID DESC']);
    	$db->db()->close();
    	return $result;    	
    } 
    public function viewLimitedPagesfaq($limit,$offset)
    {
    	$db = new Model;
    	$result = $db->db()->select(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'limit' => ['start' => $limit , 'end' => $offset],'wheres'=> ['type ='."'faq'"],'order_by'=> 'ID DESC']);
    	$db->db()->close();
    	return $result;    	
    }       
    public function isBlog($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ['slug ='."'{$slug}' AND type = 'blog'"]]);
        $db->db()->close();
        return $result;
    }
    public function isFaq($slug)
    {
        $db = new Model;
        $result = $db->db()->count(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'wheres' => ['slug ='."'{$slug}' AND type = 'faq'"]]);
        $db->db()->close();
        return $result;
    }    
	public function pageUpdate($params,$id)
	{
    	$db = new Model;
    	$update = $db->db()->update(['db_name'=>static::$db_name,'table'=>static::$db_tbl,'columns'=>$params,'wheres'=>['id ='.$id]]);
    	$db->db()->close();
    	return $update;		
	}
}
