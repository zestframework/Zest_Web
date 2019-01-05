<?= \Zest\View\View::view('nav'); ?>
<title>News</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Read all news related to zest framework free of cost if any question feel free to ask in our community">
<meta name="keywords" lang="en" content="News,latest,live,free,zest,framework,master,articles,article">

    <!-- section -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="section-title">
                  <h2>News</h2>
                </div>
              </div>

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

              <div class="col-md-12">
                <div class="post post-row">
                  <a class="post-img" href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>"><img src="https://zestframework.xyz/read/image/<?=$value['image']?>" alt=""></a>
                  <div class="post-body">
                    <div class="post-meta">
                      <a class="post-category cat-2" href="https://zestframework.xyz">ZestFramework</a>
                      <span class="post-date"><?=$value['created']?></span>
                    </div>
                    <h3 class="post-title"><a href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>"><?=$value['title']?></a></h3>
                    <p><?= substr($value['scontent'], 0, 255) ?></p>
                  </div>
                </div>
              </div>
              
      <?php  } ?>
      <?=pagination($tItems,$limit,$args['page'],$url);?>
            </div>
          </div></div></div></div>

<?= \Zest\View\View::view('footer'); ?>