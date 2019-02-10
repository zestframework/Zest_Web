<?php
$user = new \Zest\Auth\User;
 if (!$user->isLogin()) {
     if (is_cookie('user')) {
          \Zest\Session\Session::setValue('user',get_cookie('user')); 
     }
   } else {
     if (\Zest\Session\Session::getValue('user') !== get_cookie('user')) {
      redirect(site_base_url()."/account/logout");
     }
   }   
?>      
<!DOCTYPE html>
<html class="no-js">
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
      <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/styles/default.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/linearicons.css">
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/magnific-popup.css">
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/jquery-ui.css">        
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/nice-select.css">              
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/animate.min.css">
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/owl.carousel.css">       
      <link rel="stylesheet" href="<?= site_base_url(); ?>/standard/assets/css/main.css">   
      <link rel="shortcut icon" type="image/png" href="<?= site_base_url(); ?>/standard/image/icon.png"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="google-site-verification" content="<?= $args[5]['value'] ?>" />
</head>
<body>


    <header id="header">
        <div class="container main-menu">
          <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
              <a href="<?=site_base_url()?>"><img src="<?=site_base_url();?>/standard/image/icon.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <li><a href="<?=site_base_url()?>">Home</a></li>
                <li><a href="<?=site_base_url()?>/blogs/1">Blogs</a></li>
                <li><a href="<?=site_base_url()?>/news/1">News</a></li>
                <li><a href="<?=site_base_url()?>/community/1">Community</a></li>
                <li class="menu-has-children"><a href="javascript:void(0)">Developers</a>
                  <ul>
                      <li><a class="" href="https://github.com/Softhub99/Zest">Github</a></li>     
                      <li><a class="" href="https://zest.readthedocs.io/en/latest/">Documentation</a></li> 
                      <li><a class="" href="<?=site_base_url()?>/references">References</a></li>
                      <li><a class="" href="https://github.com/Softhub99/Zest/issues/new/">Report issue</a></li>
                  </ul>
                </li>   
                <li class="menu-has-children"><a href="javascript:void(0)">Download</a>
                  <ul>
                      <li><a class="" href="<?=site_base_url()?>/components/1">Components</a></li>
                  </ul>
                </li>            
                <?php if ($user->isLogin()) { ?>
                <li class="menu-has-children"><a href="javascript:void(0)">My Account</a>
                  <ul>
                 <?php if ((new \App\Models\Account())->isAdmin()): ?>
                      <li><a class="" href="<?= site_base_url(); ?>/admin/home">Admin</a></li>          
                 <?php endif; ?> 
                  <li><a class="" href="<?= site_base_url(); ?>/components/add">Add Component</a></li>
                  <li><a class="" href="<?= site_base_url(); ?>/community/add">Add Topic</a></li>
                  <li><a class="" href="<?= site_base_url(); ?>/@<?= $user->loginUser()[0]['username'] ?>">Profile</a></li>
                  <li><a class="" href="<?= site_base_url(); ?>/account/profile/edit">Edit</a></li>            
                  <li><a class="" href="<?= site_base_url(); ?>/account/logout">Logout</a></li>
                  </ul>
                </li>                   
                <?php } else { ?>
                  <li><a class="" href="<?= site_base_url(); ?>/account/login">Login</a></li>
                  <li><a class="" href="<?= site_base_url(); ?>/account/signup">Signup</a></li>
                <?php } ?>                                    
              </ul>
            </nav><!-- #nav-menu-container -->            
          </div>
        </div>
        <?php 
          $msg = view_system_message();
          if (!empty($msg)) :
             echo $msg;
           endif;   
        ?>
      </header><!-- #header -->
<script type="text/javascript">
    url = "<?= site_base_url(); ?>/";
</script>  


