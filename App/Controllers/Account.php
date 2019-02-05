<?php

namespace App\Controllers;

//for using View
use Zest\View\View;
//for using auth
use Zest\Auth\Auth;
use Zest\Auth\User;

class Account extends \Zest\Controller\Controller
{
    public function isLogin() 
    {
        $user = new User;
        if ($user->isLogin()) {
            redirect(site_base_url()."/account/profile/edit");
        } 
    }
    public function login()
    {
        $this->isLogin();
        View::view("account/login");
    }
    public function loginProcess() 
    {
        $this->isLogin();
        $username = escape(input('username'));
        $password = escape(input('password'));
        $auth = new Auth;
        $auth->signin()->signin($username,$password);
        if ($auth->fail()) {
            $errors = $auth->error()->get();
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            echo '1';
        }
    }
    public function signup()
    {
        $this->isLogin();
        View::view("account/signup");
    } 
    public function signupProcess() 
    {
        $this->isLogin();
         $value = \Zest\Session\Session::getValue('signup');
         if (time() > $value) {
            \Zest\Session\Session::unsetValue('signup');
         }        
        if (!(new \App\Models\Account)->isSignup()) {
            $name = escape(input('name'));
            $username = escape(input('username'));
            $email = escape(input('email'));
            $password = escape(input('password'));
            $confirm = escape(input('confirm'));
            $auth = new Auth;
            $avatar = new \Zest\Image\Avatar\Avatar();
            if (input('name')) {
                $target = "../Storage/Data/";
                $avatar_Name = (new \Zest\Site\Site())::salts(10).'.png';
            } else {
                $avatar_Name = 'null';
            } 
            $auth->signup()->signup($username,$email,$password,['name' => $name, 'passConfirm' => $confirm,'role' => 'normal','created' => time(),'ip' => (new \Zest\UserInfo\UserInfo)->ip(),'pimg' => $avatar_Name]);
            if ($auth->fail()) {
                $errors = $auth->error()->get();
                foreach ($errors as $error) {
                    if (is_array($error)) {
                        foreach ($error as $value) {
                            echo $value."<br>";
                        }
                    } else {
                        echo $error."<br>";
                    }
                }
            } else {
                $avatar->save($name,1024,'','',$target.$avatar_Name);
                \Zest\Session\Session::setValue('signup',time() + 3600);
                echo 'Your account has been created login to enjoy in our services';
            }
        } else {
            echo "You're allow create only one account within one hour";
        }
    }
    public function logout() 
    {
        $auth = new Auth;
        $auth->logout();
        redirect(site_base_url()."/account/login");
    }     
    public function profileEdit()
    {
        $user = new User;
        if ($user->isLogin()) {
            $args = $user->loginUser();
            View::View('account/profile',$args[0]);
        } else {
            View::view('errors/404');
        }
    }      
    public function profileUpdate()
    {
        $user = new User;
        $error = false;
        $name = escape(input('name'));      
        if ($error !== true) {
            $auth = new Auth;
            $id = $user->loginUser()[0]['id'];
            $auth->update()->update(['name'=>$name],$id);
            if ($auth->fail()) {
                $errors = $auth->error()->get();
                foreach ($errors as $error) {
                    if (is_array($error)) {
                        foreach ($error as $value) {
                            echo $value."<br>";
                        }
                    } else {
                        echo $error."<br>";
                    }
                }
            } else {
                echo 'Your account has been updated successfully';
            }            
        }
    }
    public function profileBioUpdate()
    {
        $user = new User;
        $bio = escape(input('bio'));      
        $auth = new Auth;
        $id = $user->loginUser()[0]['id'];
        $auth->update()->update(['bio'=>$bio],$id);
        if ($auth->fail()) {
            $errors = $auth->error()->get();
            foreach ($errors as $error) {
                if (is_array($error)) {
                    foreach ($error as $value) {
                        echo $value."<br>";
                    }
                } else {
                    echo $error."<br>";
                }
            }
        } else {
            echo 'Your account bio has been updated successfully';
        }            
    }  
    public function profilePasswordUpdate()
    {
        $user = new User;
        $error = false;
        if (!input('password') || !input('confirm')) {
            $error = true;
            echo "Password fields are required";
        }
        if (!$error) {
           $password = escape(input('password'));   
           $confirm = escape(input('confirm'));      
            $auth = new Auth;
            $id = $user->loginUser()[0]['id'];
            $auth->update()->updatePassword($password,$confirm,$id);
            if ($auth->fail()) {
                $errors = $auth->error()->get();
                foreach ($errors as $error) {
                    if (is_array($error)) {
                        foreach ($error as $value) {
                            echo $value."<br>";
                        }
                    } else {
                        echo $error."<br>";
                    }
                }
            } else {
                echo 'Your account password has been updated successfully';
            }              
        }          
    }    
    public function profileView() 
    {
       $username = $this->route_params['username'];
       $username = str_replace("@", '', $username);
       $user = new User;
       if ($user->isUsername($username)) {
            $args = $user->getByWhere('username',$username);
            View::view('account/profileView',$args[0]);
       } else {
            View::view('errors/404');
       } 
    }  
}
