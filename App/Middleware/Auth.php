<?php

namespace App\Middleware;

use Zest\Auth\User;

class Auth
{
    public function before($request, $response, $params)
    {
        $user = new User();
        if ($user->isLogin() !== true) {
            if ($request->isXhr() !== true) {
                redirect(site_base_url());
            } else {
                echo "<span style='color:red'>Sorry, You're not allowed to do that action</span>";
            }
        }

    }

    public function after($request, $response, $params)
    {
       //Do Nothing.
    }
}
