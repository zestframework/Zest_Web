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
$router->get('account/profile/edit',"Account@profileEdit","Auth");
$router->post('account/update/action',"Account@profileUpdate","Auth");
$router->post('account/update/bio/action',"Account@profileBioUpdate","Auth");
$router->post('account/update/password/action',"Account@profilePasswordUpdate","Auth");
$router->get('account/reset-password',"Account@passwordReset");
$router->post('account/reset-password/process',"Account@passwordResetProcess");
$router->get('account/password/reset/{token:([a-zA-Z0-9])+}',"Account@resetMyPassword");
$router->post('account/password/reset/process',"Account@resetMyPasswordProcess");
$router->post('account/password/reset/process',"Account@resetMyPasswordProcess");
$router->post('uploader/image',"Account@imageUploader");

//Admin

$router->get('admin/home',"Admin@index",'AdminMiddleware');
$router->add('admin/page/add',"Admin@pageAdd","GET|POST|HEAD",'AdminMiddleware');
$router->get('admin/page/view',"Admin@pageView",'AdminMiddleware');
$router->add('admin/view/page/{id:[0-9]+}',"Admin@pageViewId","GET|POST|HEAD",'AdminMiddleware');
$router->get('admin/users/view',"Admin@users",'AdminMiddleware');
$router->add('admin/view/user/{id:[0-9]+}',"Admin@userViewId","GET|POST|HEAD",'AdminMiddleware');
$router->get('admin/generate/sitemap',"Admin@generateSiteMap",'AdminMiddleware');
$router->add('admin/send/mail',"Admin@sendMails","GET|POST|HEAD",'AdminMiddleware');
$router->add('admin/announcement',"Admin@announcement","GET|POST|HEAD",'AdminMiddleware');

//blogs 
$router->get('blogs/{page:[0-9]+}',"Blogs@blog");
$router->get('blog/view/{slug:[A-Za-z0-9]+}/{title:[A-Za-z0-9+.-]+}',"Blogs@view");

//faqs 
$router->get('faqs/{page:[0-9]+}',"Faq@faq");
$router->get('faq/view/{slug:[A-Za-z0-9]+}/{title:[A-Za-z0-9+]+}',"Faq@view");

//News
$router->get('news/{page:[0-9]+}',"News@index");
$router->get('news/view/{slug:[A-Za-z0-9]+}/{title:[A-Za-z0-9\+\.-]+}',"News@view");

//Site
$router->get('site/terms',"Site@terms");
$router->get('site/privacy',"Site@privacy");
$router->get('site/contact',"Site@contact");

//Contribute
$router->get('contribute/index',"Contribute@index");
$router->get('contribute/donate',"Contribute@donation");

//Community
$router->get('community/add',"Community@add");
$router->post('community/add/process',"Community@addProcess","Auth");
$router->get('community/{page:[0-9\.\-]+}',"Community@index");
$router->add('community/view/{slug:[A-Za-z0-9]+}/{page:[0-9\.\-]+}',"Community@view","GET|POST|HEAD");

//Components
$router->get('components/add',"Components@add");
$router->post('components/add/process',"Components@addProcess","Auth");
$router->get('components/{page:[0-9]+}',"Components@index");
$router->add('components/view/{slug:[A-Za-z0-9]+}/{page:[0-9\.\-]+}',"Components@view","GET|POST|HEAD");

//Readers
$router->get('read/image/{image:[a-z0-9.]+}',"Reader@image");
$router->get('read/image/{folder:[A-Za-z]+}/{image:[a-z0-9.]+}',"Reader@folderImage");
$router->get('read/zip/{zip:[a-z0-9.]+}',"Reader@zip");
