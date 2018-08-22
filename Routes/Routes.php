<?php

// Home
$router->get('',"Home@index");

//Account
$router->get('account/login',"Account@login");
$router->post('account/login/action',"Account@loginProcess");
$router->get('account/signup',"Account@signup");
$router->post('account/signup/action',"Account@signupProcess");
$router->get('account/logout',"Account@logout");
$router->get('{username:@([a-zA-Z0-9])+}',"Account@profileView");
$router->get('account/profile/edit',"Account@profileEdit");
$router->post('account/update/action',"Account@profileUpdate");
$router->post('account/update/bio/action',"Account@profileBioUpdate");
$router->post('account/update/password/action',"Account@profilePasswordUpdate");

//Admin
$router->get('admin/home',"Admin@index");
$router->get('admin/site/setting',"Admin@siteSetting");
$router->add('admin/page/add',"Admin@pageAdd","GET|POST|HEAD");
$router->get('admin/page/view',"Admin@pageView");
$router->get('admin/view/page/{id:[0-9]+}',"Admin@pageViewId");

//blogs 
$router->get('blogs/{page:[0-9]+}',"Blogs@blog");
$router->get('blog/view/{slug:[A-Za-z0-9]+}/{title:[A-Za-z0-9+]+}',"Blogs@view");

//faqs 
$router->get('faqs/{page:[0-9]+}',"Faq@faq");
$router->get('faq/view/{slug:[A-Za-z0-9]+}/{title:[A-Za-z0-9+]+}',"Faq@view");

//Site
$router->get('site/terms',"Site@terms");
$router->get('site/privacy',"Site@privacy");

//Community
$router->get('community/add',"Community@add");
$router->post('community/add/process',"Community@addProcess");
$router->get('community/{page:[0-9]+}',"Community@index");
$router->add('community/view/{slug:[A-Za-z0-9]+}',"Community@view","GET|POST|HEAD");

//Components
$router->get('components/add',"Components@add");
$router->post('components/add/process',"Components@addProcess");
$router->get('components/{page:[0-9]+}',"Components@index");
$router->add('components/view/{slug:[A-Za-z0-9]+}',"Components@view","GET|POST|HEAD");

//Readers
$router->get('read/image/{image:[a-z0-9.]+}',"Reader@image");
$router->get('read/zip/{zip:[a-z0-9.]+}',"Reader@zip");

//Cache the routes
$router->cacheRouters();
//Dispatch the request
$router->dispatch($_SERVER['QUERY_STRING']);
