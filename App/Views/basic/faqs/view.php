<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<meta name="author" content="<?= (new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['name'] ?>">
<meta name="description" lang="en" content="<?=$args['scontent']?>">
<meta name="keywords" lang="en" content="<?=$args['keyword']?>">
<style type="text/css">
  body {
    background-color: #fff!important;
  }
</style>
<div id='pages'>
    <h1 class="align-center"><?=$args['title']?></h1>
</div> 
<div class="container">
  <h1 class="zest-title"><span class="page-title"><?=$args['title']?></span></h1>
  <p class="verdana"><?php
  $html = (new \Parsedown())->text($args['content']);
	echo html_entity_decode($html);
		?>      
    </p>
</div>
<div id='white-board'></div> 
<?= \Zest\View\View::view('footer'); ?>