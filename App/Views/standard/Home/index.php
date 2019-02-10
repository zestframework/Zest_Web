<?= \Zest\View\View::view('nav'); ?>
<meta name="author" content="Malik umer Farooq">
<neta name="description" content="<?= $args[3]['value'] ?>"/>
<neta name="keyword" content="<?= $args[4]['value'] ?>"/>
<title>Zest Framework</title>
      <section class="banner-area">
        <div class="container">
          <div class="row fullscreen align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6 banner-left">
              <h6>PHP</h6>
              <h1>Zest Framework</h1>
              <img src='<?=site_base_url()?>/standard/image/cover.jpg' class='image-responsive' style='width:250px' /><br\><p>
                Zest is a simple yet powerful PHP MVC framework for rapid application development that is suited for small to medium scale apps and APIs.
              </p>
              <a href="https://zest.readthedocs.io/en/latest/" class="genric-btn primary radius">Get Started</a>
            </div>
          </div>
        </div>          
      </section>

      <!-- Blogs -->
      <section class="recent-blog-area section-gap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 pb-30 header-text">
              <h1>Latest posts from our blog</h1>
              <p>
                Read blogs to increase knowledge about Zest framework.
              </p>
            </div>
          </div>
          <div class="row"> 
            <?php          
             $pages = \App\Models\Pages::viewLimitedPagesBlog(3,0);
            foreach ($pages as $page => $value) { ?>

            <div class="single-recent-blog col-lg-4 col-md-4">
              <div class="thumb">
                <img class="f-img img-fluid mx-auto" src="<?=site_base_url()?>/read/image/<?=$value['image']?>" alt=""> 
              </div>
              <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                <div>
                  <a href="#"><span> <p><a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a> </p></span></a>
                </div>
                <div class="meta">
                  <?=$value['created']?>
                </div>
              </div>              
              <a href="<?=site_base_url()?>/blog/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>">
                <h4><?=$value['title']?></h4>
              </a>
              <p>
                  <?= substr($value['scontent'], 0, 255) ?> </p>
            </div>
          <?php } ?>                                       
          </div>
        </div>  
      </section>


      <!-- Topics -->
      <section class="recent-blog-area section-gap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 pb-30 header-text">
              <h1>Latest posts from our Community</h1>
              <p>
                Reply to topics to help others.
              </p>
            </div>
          </div>
          <div class="row"> 
            <?php          
             $pages = \App\Models\Community::viewLimitedCommunity(3,0);
            foreach ($pages as $page => $value) { ?>

            <div class="single-recent-blog col-lg-4 col-md-4">
              <div class="thumb">
                <img class="f-img img-fluid mx-auto" src="<?=site_base_url()?>/read/image/<?=$value['image']?>" alt=""> 
              </div>
              <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                <div>
                  <a href="#"><span> <p><a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a> </p></span></a>
                </div>
                <div class="meta">
                  <?=$value['created']?>
                </div>
              </div>              
              <a href="<?=site_base_url()?>/community/view/<?=$value['slug']?>">
                <h4><?=$value['title']?></h4>
              </a>
              <p>
                  <?= substr($value['contents'], 0, 255) ?> </p>
            </div>
          <?php } ?>                                       
          </div>
        </div>  
      </section>
      <!-- News -->
      <section class="recent-blog-area section-gap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 pb-30 header-text">
              <h1>Latest posts from our News</h1>
              <p>
                Read news to stay connected with Zest Framework.
              </p>
            </div>
          </div>
          <div class="row"> 
            <?php          
             $pages = \App\Models\Pages::viewLimitedPagesNews(3,0);
            foreach ($pages as $page => $value) { ?>

            <div class="single-recent-blog col-lg-4 col-md-4">
              <div class="thumb">
                <img class="f-img img-fluid mx-auto" src="<?=site_base_url()?>/read/image/<?=$value['image']?>" alt=""> 
              </div>
              <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                <div>
                  <a href="#"><span> <p><a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a> </p></span></a>
                </div>
                <div class="meta">
                  <?=$value['created']?>
                </div>
              </div>              
              <a href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>">
                <h4><?=$value['title']?></h4>
              </a>
              <p>
                  <?= substr($value['scontent'], 0, 255) ?> </p>
            </div>
          <?php } ?>                                       
          </div>
        </div>  
      </section>
<?= \Zest\View\View::view('footer'); ?>



