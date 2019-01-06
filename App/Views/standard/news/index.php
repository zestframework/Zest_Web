<?= \Zest\View\View::view('nav'); ?>
<title>Latest News</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Read all news related to zest framework free of cost if any question feel free to ask in our community">
<meta name="keywords" lang="en" content="News,latest,live,free,zest,framework,master,articles,article">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=939233432927660&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

       <section class="relative about-banner"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Latest News 
              </h1> 
              <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span> <a href="javascript:void(0)"> Latest News</a></p>
            </div>  
          </div>
        </div>
      </section>
      <section class="post-content-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 posts-list">
        <?php
          $tItems = count(\App\Models\Pages::pageWhere('type','news'));
          $page = $args['page'];
          $limit = 6;
          $url = "/news/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Pages::viewLimitedPagesNews($limit,$start);
            foreach ($pages as $page => $value) { ?>
          <div class="single-post row mt-10">
                <div class="col-lg-3 col-md-3 meta-details">
                  <div class="user-details row">
                    <p class="user-name col-lg-12 col-md-12 col-6"><a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a> <span class="lnr lnr-user"></span></p>
                    <p class="date col-lg-12 col-md-12 col-6"><a href="#"><?=$value['created']?></a> <span class="lnr lnr-calendar-full"></span></p>
                    <p class="comments col-lg-12 col-md-12 col-6"><a href="<?=site_base_url()?>/community/add">Any Question?</a> <span class="fa fa-question"></span></p>
                    <ul class="social-links col-lg-12 col-md-12 col-6">
                      <div class="fb-share-button" data-href="<?=site_base_url();?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    </ul>                    
                  </div>
                </div>
                <div class="col-lg-9 col-md-9 ">
                  <div class="feature-img">
                    <img class="img-fluid" src="<?=site_base_url()?>/read/image/<?=$value['image']?>"" alt="">
                  </div>
                  <a class="posts-title" href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>"><h3><?=$value['title']?></h3></a>
                  <p class="excert">
                    <?= substr($value['scontent'], 0, 255) ?>
                  </p>
                  <a href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" class="primary-btn">View More</a>
                </div>
              </div>     
              <hr>                       
      <?php  } ?>
    </div></div></div></section>
      <div class="blog-pagination justify-content-center d-flex"><?=pagination($tItems,$limit,$args['page'],$url);?></div>

<?= \Zest\View\View::view('footer'); ?>