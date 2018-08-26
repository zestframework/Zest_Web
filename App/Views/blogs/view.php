<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<style type="text/css">
  body {
    background-color: #fff!important;
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
<div id='pages'>
    <h1 class="align-center"><?=$args['title']?></h1>
</div> 
<div class="container">
  <h1 class="zest-title"><span class="page-title"><?=$args['title']?></span></h1>
  <div><b><?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?></b> </div>
  <i><?= $args['created']?></i> 
  <br>
  <div class="fb-share-button" data-href="<?=site_base_url();?>/blog/view/<?=$args['slug']?>/<?=urlencode($args['title'])?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
  <br>
  <p class="verdana"><?php
  $html = (new \Parsedown())->text($args['content']);
	echo html_entity_decode($html);
		?>      
    </p>
  <br>
  

</div></div>
<?= \Zest\View\View::view('footer'); ?>