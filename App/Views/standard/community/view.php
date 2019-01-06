<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title><?=$args['title']?></title>
<meta name="author" content="<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?>">
<meta name="keywords" lang="en" content="community,forum,free , questions , parts , ,<?= $args['title'] ?>,zest,framework,php,php7,php7.2,Zest framework">

      <section class="relative about-banner"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                <?=$args['title']?>   
              </h1> 
              <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="<?=site_base_url()?>/community/1">Community </a> <span class="lnr lnr-arrow-right"></span> <a href="javascript:void(0)"> <?=$args['title']?></a></p>
            </div>  
          </div>
        </div>
      </section>

<div class="card">
	<div class="card-body">
	<img class="" src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']);?>' id='community-user-image'>
  	<div id='community-topic'>
	  	<h5 id=''><b><a href="<?=site_base_url()?>/@<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']?>" ><?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?></a></b></h5>
		<h5 id='cummunity-time'><i><?=$args['created']?></i></h5>
		<p class="text-right" id=''><?=  html_entity_decode((new \Parsedown())->text($args['contents']));?></p>
  			<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
							<div class='alert alert-info' style='color:white'>This topic has been closed by admin</div>
			<?php } ?>

  	</div>
  </div>
<?php if ((new \App\Models\Account)->isAdmin()) {
		if ((new \App\Models\Community)->isClose($args['slug'])) {
	?>
   <form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>" method='post'>
		<input type='submit' name='open' class='genric-btn primary radius' value='Open' />
   </form>
	<?php } else { ?>
	    <form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>" method='post'>
			<input type='submit' name='close' class='genric-btn primary radius' value='Close'  />
		</form>
	<?php }} ?>
<span class="mt-10"></span>  
</div> 

<div class='sample-text-area'>
	<div class="container">
		<h2 class="mb-10">Replies</h2>
		 <?php
			$replies = (new \App\Models\Community)->communityReplies($args['slug']);
            foreach ($replies as $reply => $value) { ?>
<div class="card">
	<div class="card-body">
	<img class="" src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['username']);?>' id='community-user-image'>
  	<div id='community-topic'>
	  	<h5 id=''><b><a href="<?=site_base_url()?>/@<?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['username']?>" ><?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['name']?></a></b></h5>
		<h5 id='cummunity-time'><i><?=$value['created']?></i></h5>
		<p class="text-right" id=''><?=  html_entity_decode((new \Parsedown())->text($value['contents']));?></p>
  			<?php if ((new \App\Models\Community)->isClose($value['slug'])) { ?>
							<div class='alert alert-info' style='color:white'>This topic has been closed by admin</div>
			<?php } ?>

  	</div>
  </div>
</div>
<?php } ?> 	
		<?php if ((new \Zest\Auth\User())->isLogin()) {
			if (!(new \App\Models\Community)->isClose($args['slug'])) { ?>
	<div class="card">
		<div class="card-body">
			<form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>" method="post">
				<textarea id="description" name='description' class="materialize-textarea"></textarea>
				<input type='submit' name='submit' class='genric-btn primary radius' value='submit' style='color:white!important;' />	

			</form>
		</div>	
	</div>


	<?php }} else { ?>
		<div class='alert info' style='color:white'>You should login in order to reply this topic</div>		
	<?php } ?>
	</div>		
</div>
<?= \Zest\View\View::view('footer'); ?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>
