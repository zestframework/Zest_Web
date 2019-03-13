<?php

namespace App\Models;

use Zest\Session\Session;
use Zest\Database\Db as Model;
use Config\Database;
use Zest\Auth\Auth;
use Zest\Auth\User;

class Account extends Model
{	

	public function isSignup()
	{
		return (Session::has('signup')) ? true : false;
	}		
    public function isAdmin(){
         $user = new User;
        if ($user->isLogin() && $user->loginUser()[0]['role'] === 'admin') {
            return true;
        }     
		return false;
    }    	
}
