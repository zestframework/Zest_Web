<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<meta name="author" content="<?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?>">
<meta name="description" lang="en" content="<?=$args['scontent']?>">
<meta name="keywords" lang="en" content="<?=$args['keyword']?>">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=939233432927660&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

      <!-- Page Header -->
      <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url('https://zestframework.xyz/read/image/<?=$args['image']?>');"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <div class="post-meta">
                <a class="post-category cat-2" href="https://zestframework.xyz">ZestFramework</a>
                <span class="post-date"><?= $args['created']?></span>
              </div>
              <h1><?= $args['title']?></h1>
            </div>
          </div>
        </div>
      </div>

     
<div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- Post content -->
          <div class="col-md-8">
            <div class="section-row sticky-container">
              <div class="main-post">
                  <div class="fb-share-button" data-href="<?=site_base_url();?>/news/view/<?=$args['slug']?>/<?=urlencode($args['title'])?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                <h3><?= $args['title']?></h3>
                <p><?php
                  $html = (new \Parsedown())->text($args['content']);
                  echo html_entity_decode($html);
                    ?>  </p>
              </div>
            </div>

            <!-- author -->
            <div class="section-row">
              <div class="post-author">
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="https://zestframework.xyz/read/image/<?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['pImg'] ?>" alt="">
                  </div>
                  <div class="media-body">
                    <div class="media-heading">
                      <h3><?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?></h3>
                    </div>
                    <p><?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['bio'] ?></p>
                  </div>
                </div>
              </div>
            </div>
           </div>
           </div></div></div> 
            <!-- /author -->      
<?= \Zest\View\View::view('footer'); ?>