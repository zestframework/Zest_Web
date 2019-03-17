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

        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>News</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=site_base_url()?>">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->
    <section class="blog-area section_padding_100">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 zest-blog-posts">
        <?php
          $tItems = count(model('Pages')->pageWhere('type','news'));
          $page = $args['page'];
          $limit = 6;
          $url = "/news/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = model('Pages')->viewLimitedPagesNews($limit,$start);
            foreach ($pages as $page => $value) { ?>
                            <div class="col-12">
                                <div class="single-blog wow fadeInUp" data-wow-delay="0.1s">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb">
                                        <img src="<?=site_base_url()?>/read/image/<?=$value['image']?>" alt="">
                                    </div>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <h6>By <a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a></a><a href="#!"><?=$value['created']?></a><a href="#"><a href="<?=site_base_url()?>/community/add">Any Question?</a><a href='javascript:void(0)' style='color: green'><?=$value['est'];?> read</a></p><div class="fb-share-button" data-href="<?=site_base_url();?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></h6>
                                    </div>
                                    <!-- Post Title -->
                                    <a class="" href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>"><h2><?=$value['title']?></h2></a>
                                    <!-- Post Excerpt -->
                                    <p><?= substr($value['scontent'], 0, 255) ?></p>
                                    <!-- Read More btn -->
                                    <a href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" >Read More</a>
                                </div>
                            </div>
      <?php  } ?>      <div class="zest-pagination-area">
          <nav>
             <?=pagination($tItems,$limit,$args['page'],$url);?>
          </nav>
      </div>                

    </div>
    
  </div></div></section>
<?= \Zest\View\View::view('footer'); ?>