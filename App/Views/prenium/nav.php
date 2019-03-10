<?php
$user = new \Zest\Auth\User;
 if (!$user->isLogin()) {
     if (is_cookie('user')) {
          \Zest\Session\Session::set('user',get_cookie('user')); 
     }
   } else {
     if (\Zest\Session\Session::get('user') !== get_cookie('user')) {
      redirect(site_base_url()."/account/logout");
     }
   }   
?>      
<!DOCTYPE html>
<html>
<head>
      <?php if (isset($args['title'])) : ?>
        <title><?=$args['title']?></title>
        <meta charset="utf-8">
        <meta property="site_name" content="Zest Framework" />
        <meta name="author" content="<?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?>">
        <meta name="description" lang="en" content="<?=$args['scontent']?>">
        <meta name="keywords" lang="en" content="<?=$args['keyword']?>">    
      <?php endif;?>  
      <?php  $args = \App\Models\Site::get(); ?>
      <link rel="shortcut icon" type="image/png" href="<?= site_base_url(); ?>/prenium/img/icon.png"/>
      <meta name="google-site-verification" content="<?= $args[5]['value'] ?>" />
      <link href="<?=site_base_url()?>/prenium/style.css" rel="stylesheet">
      <link href="<?=site_base_url()?>/prenium/css/responsive.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
      <script>hljs.initHighlightingOnLoad();</script>

</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="zest-preloader"></div>
    </div>


    <!-- ***** Header Area Start ***** -->
    <header class="header_area clearfix">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <a class="navbar-brand" href="<?=site_base_url()?>"><img src="<?=site_base_url()?>/prenium/img/nav-icon.png" alt="logo"></a>

                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#zest-navbar" aria-controls="zest-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="zest-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="<?=site_base_url()?>">Home</a></li>
                                    <li class="nav-item "><a class="nav-link" href="<?=site_base_url()?>/blogs/1">Blogs</a></li>
                                    <li class="nav-item "><a class="nav-link" href="<?=site_base_url()?>/news/1">News</a></li>
                                    <li class="nav-item "><a class="nav-link" href="<?=site_base_url()?>/community/1">Community</a></li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="zestDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Developers</a>
                                        <div class="dropdown-menu" aria-labelledby="zestDropdown">
                                            <a class="dropdown-item" href="https://github.com/zestframework/Zest">Github</a>
                                            <a class="dropdown-item" href="about.html">Documentation</a>
                                            <a class="dropdown-item" href="https://zestframework.xyz/references/">Api Docs</a>
                                            <a class="dropdown-item" href="https://github.com/zestframework/Zest_Framework/issues/new/choose">Report issue</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="zestDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Downloads</a>
                                        <div class="dropdown-menu" aria-labelledby="zestDropdown">
                                            <a class="dropdown-item" href="<?= site_base_url()?>/components/1">Components</a>
                                        </div>
                                    </li>
                                <?php if ($user->isLogin()) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="zestDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                        <div class="dropdown-menu" aria-labelledby="zestDropdown">
                                    <?php if ((new \App\Models\Account())->isAdmin()): ?>
                                       <a class="dropdown-item" href="<?=site_base_url()?>/admin/home">Admistrator</a>       
                                        <?php endif; ?> 
                                            <a class="dropdown-item" href="<?=site_base_url()?>/components/add">Add Component</a>
                                            <a class="dropdown-item" href="<?=site_base_url()?>/community/add">Add Topic</a>
                                            <a class="dropdown-item" href="<?=site_base_url()?>/@<?= $user->loginUser()[0]['username'] ?>">Profile</a>
                                            <a class="dropdown-item" href="<?=site_base_url()?>/account/profile/edit">Edit</a>
                                            <a class="dropdown-item" href="<?=site_base_url()?>/account/logout">Logout</a>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="zestDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Signin</a>
                                        <div class="dropdown-menu" aria-labelledby="zestDropdown">
                                            <a class="dropdown-item" href="<?= site_base_url()?>/account/login">Login</a>
                                            <a class="dropdown-item" href="<?= site_base_url()?>/account/signup">Signup</a>
                                        </div>
                                    </li>

                               <?php } ?> 
                             </ul>
                                <!-- Search Form Area Start -->
                                <!--<div class="search-form-area animated">
                                    <form action="#" method="post">
                                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                        <button type="submit" class="d-none"><img src="img/core-img/search-icon.png" alt="Search"></button>
                                    </form>
                                </div>
                                //Search btn 
                                <div class="search-button">
                                    <a href="#" id="search-btn"><img src="<?=site_base_url()?>/prenium/img/search-icon.png" alt="Search"></a>
                                </div> -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
       <?php 
          $announcement = model('Announcement')->get()[0];
          if (!empty($announcement['detail'])) {
            echo "<span class='alert alert-".$announcement['type']."'>".$announcement['detail']."</span><br>";
         }
          $msg = view_system_message();
          if (!empty($msg)) :
             echo $msg;
           endif;   
        ?>
    </header>
    <!-- ***** Header Area End ***** -->
<script type="text/javascript">
    url = "<?= site_base_url(); ?>/";
</script>  
