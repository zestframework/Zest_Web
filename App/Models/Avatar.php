<?php

namespace App\Models;

use Zest\Database\Db as Model;
use Config\Database;

class Avatar extends Model
{	
	/* 
	* Store database name
	*/
	protected static $db_name = Database::DB_NAME;
	/* 
	* Store database table name
	*/
	protected static $db_tbl = 'users';
	
	public function getAvaterUrlByUsername($username) 
	{
		$user = new \Zest\Auth\User();
		if ($user->isUsername($username)) {
			$pImg = $user->getByWhere('username',$username)[0]['pimg'];
			if ($pImg !== null) {
				$avater = site_base_url() . "read/image/". $pImg;
			} else {
				$avater = site_base_url() . "image/user.jpg";
			}
			return $avater;
		} else {
			return false;
		}
	}	
}
