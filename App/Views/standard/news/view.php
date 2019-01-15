<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<meta property="site_name" content="Zest Framework" />
<meta property="type" content="news" />
<meta name="author" content="<?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?>">
<meta name="description" lang="en" content="<?=$args['scontent']?>">
<meta property="news:published_time" content="<?=$args['created']?>" />
<meta name="keywords" lang="en" content="<?=$args['keyword']?>">
<style type="text/css">
  p img {
  margin-top: 30px;
  background-repeat: no-repeat !important;
  background-position: center center !important;
  background-size: cover !important;
  height: 200px;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}

p img:hover {
  opacity: .8;
}
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=939233432927660&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



      
      <!-- start banner Area -->
      <section class="relative about-banner"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                <?=$args['title']?>   
              </h1> 
              <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="<?=site_base_url()?>/news/1">News </a> <span class="lnr lnr-arrow-right"></span> <a href="javascript:void(0)"> <?=$args['title']?></a></p>
            </div>  
          </div>
        </div>
      </section>
      <!-- End banner Area -->            
      
      <!-- Start post-content Area -->
      <section class="post-content-area single-post-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 posts-list">
              <div class="single-post row">
                <div class="col-lg-12">
                  <div class="feature-img">
                    <img class="img-fluid" src="<?=site_base_url()?>/read/image/<?=$args['image']?>" alt="">
                  </div>                  
                </div>
                <div class="col-lg-3  col-md-3 meta-details">
                  <div class="user-details row">
                    <p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?></a> <span class="lnr lnr-user"></span></p>
                    <p class="date col-lg-12 col-md-12 col-6"><a href="#"><?=$args['created']?></a> <span class="lnr lnr-calendar-full"></span></p>
                    <p class="comments col-lg-12 col-md-12 col-6"><a href="<?=site_base_url()?>/community/add">Any Question?</a> <span class="fa fa-question"></span></p>
                    <ul class="social-links col-lg-12 col-md-12 col-6">
                      <div class="fb-share-button" data-href="<?=site_base_url();?>/blog/view/<?=$args['slug']?>/<?=urlencode($args['title'])?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    </ul>                                       
                  </div>
                </div>
                <div class="col-lg-9 col-md-9">
                  <h3 class="mt-20 mb-20"><?=$args['title']?></h3>
                  <p class="excert"><?php
                  $html = (new \Parsedown())->text($args['content']);
                  echo html_entity_decode($html);
                    ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget user-info-widget">
                  <img src="img/blog/user-info.png" alt="">
                  <a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['username'] ?>"><h4><?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?></h4></a>
                  <p>
                    Founder and CEO
                  </p>
                  <p>
                    <?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['bio'] ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </section>
      <!-- End post-content Area -->


<?= \Zest\View\View::view('footer'); ?>