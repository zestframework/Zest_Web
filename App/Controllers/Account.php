<?php

namespace App\Controllers;

use Zest\Auth\Auth;
use Zest\Auth\User;
use Zest\Site\Site;

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
        view("account/login");
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
            add_system_message("Your account has been loggedIn", "success");
            echo '1';
        }
    }
    public function signup()
    {
        $this->isLogin();
        view("account/signup");
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
            View('account/profile',$args[0]);
        } else {
            view('errors/404');
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
            view('account/profileView',$args[0]);
       } else {
            view('errors/404');
       } 
    }  

    public function passwordReset()
    {
        if (!(new \Zest\Auth\User())->isLogin()) {
            view("account/password_reset");
        } else {
            view("errors/404");
        }
         
    }

    public function passwordResetProcess()
    {
        if (input('submit')) {
            $email = escape(input('email'));
            $user = new User();
            if ($user->isEmail($email)) {
                $auth = new Auth();
                $id = $user->getByWhere('email',$email)[0]['id'];
                $token = Site::salts(10);
                $link = site_base_url().'/account/password/reset/'.$token;
                $auth->update()->update(['resetToken'=> $token],$id);
                $html = "Dear {$email} we receive password reset request from your accont <br>
                 <a href='{$link}'>Reset my password</a> <br>
                 if you unable to click above copy paste below link <br> 
                 $link
                 <br>
                 if you don't do this simply, ignore this mail.
                ";
                model("Mailer")->send($email,"Password reset request",$html);
                add_system_message("Your password reset request has been received, check your email.","success");
                redirect(site_base_url());
            } else {
                add_system_message('Sorry, the email "'.$email. '" doesn\'t exist','error');
                redirect(site_base_url());
            }
        }
    }
    public function resetMyPassword()
    {
        if (!(new \Zest\Auth\User())->isLogin()) {
            $token = $this->route_params['token'];
            $user = new User();
            if (count($user->getByWhere('resetToken',$token)) > 0) {
                $id = $user->getByWhere('resetToken',$token)[0]['id'];
                view("account/reset",['id' => $id, 'token' => $token]);
            } else {
                add_system_message("Sorry, You can not perform this action",'error');
                redirect(site_base_url());
            }
        } else {
            view("errors/404");
        }    
    }
    public function resetMyPasswordProcess()
    {
        if (input('submit')) {
            $token = input('token');
            $error = false;
            if (!input('password') || !input('confirm')) {
                $error = true;
                add_system_message("Password fields are required");
                redirect(site_base_url().'/account/password/reset/'.$token);
            }
            if (!$error) {
                $id = input('id');
                $password = escape(input('password'));
                $confirm = escape(input('confirm'));
                $auth = new Auth;
                $auth->update()->updatePassword($password,$confirm,$id);
                if ($auth->fail()) {
                    $errors = $auth->error()->get();
                    foreach ($errors as $error) {
                        if (is_array($error)) {
                            foreach ($error as $value) {
                                add_system_message($value."<br>",'error');
                            }
                        } else {
                            add_system_message($error."<br>",'error');
                        }
                    }
                    redirect(site_base_url().'/account/password/reset/'.$token);
                } else {
                    $auth->update()->update(['resetToken'=> 'NULL'],$id);
                    $user = new User();
                    $email = $user->getByWhere('id',$id)[0]['email'];
                    $html = "Dear {$email} your password has been updated <br>
                    if you do not do this and think its a mistake then contact us at email <br> lablnet01@gmail.com
                    ";
                    model("Mailer")->send($email,"Your password has been updated",$html);
                    add_system_message("Your account password has been updated successfully",'success');
                    redirect(site_base_url());
                } 
            } 
        }
    }
}
