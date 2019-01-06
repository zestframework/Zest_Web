<?= \Zest\View\View::view('nav'); ?>
<title>Community</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" content="This is free community about Zest Framework ask any question that is in your mind">
<meta name="keywords" lang="en" content="community,zest,framework,php,php7,php7.2,Zest framework">
       <section class="relative about-banner"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Components
              </h1> 
              <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span> <a href="javascript:void(0)"> Components</a></p>
            </div>  
          </div>
        </div>
      </section>
            <section class="post-content-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 posts-list">

        <?php
          $tItems = count(\App\Models\Components::componentAll());
          $page = $args['page'];
          $limit = 10;
          $url = "/components/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Components::viewLimitedComponent($limit,$start);
            foreach ($pages as $page => $value) { ?>
          <div class="single-post row mt-10">
                <div class="col-lg-3 col-md-3 meta-details">
                  <div class="user-details row">
                    <p class="user-name col-lg-12 col-md-12 col-6"><a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a> <span class="lnr lnr-user"></span></p>
                    <p class="date col-lg-12 col-md-12 col-6"><?php echo ($value['componentVersion']) ? $value['version'] : 0?> <span class="fa fa-version"></span></p></div>
                </div>
                <div class="col-lg-9 col-md-9 ">
                  <a class="posts-title" href="<?=site_base_url()?>/components/view/<?=$value['slug']?>"><h3><?=$value['title']?></h3></a>
                </div>
              </div>    
              <hr>                        
    <?php  } ?>

  </div></div></div></section> 

      <div class="blog-pagination justify-content-center d-flex"><?=pagination($tItems,$limit,$args['page'],$url);?></div>
  
<?= \Zest\View\View::view('footer'); ?>
