<?php

namespace App\Middleware;

use Zest\Auth\User;

class AdminMiddleware
{
    public function before($request, $response, $params)
    {
        $user = new User();
        if ($user->isLogin() !== true || $user->loginUser()[0][
            'role'] !== 'admin') {
            add_system_message("Invlild request", 'error');
            redirect(site_base_url());
        }

    }

    public function after($request, $response, $params)
    {
       //Do Nothing.
    }
}
