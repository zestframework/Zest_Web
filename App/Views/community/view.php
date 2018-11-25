<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title><?=$args['title']?></title>
<meta name="author" content="<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?>">
<meta name="keywords" lang="en" content="community,forum,free , questions , parts , ,<?= $args['title'] ?>,zest,framework,php,php7,php7.2,Zest framework">
<div id='pages'>
    <h1 class="align-center"><?=$args['title']?></h1>
</div> 
<div id='relax'></div>
<div id='relax-plater'>
  <h1 class="zest-title"><span class="page-title"><?=$args['title']?></span></h1>
<div class="card" >
<div class="card-content">
	<img src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']);?>' id='community-user-image'>
	<h5 id='cummunity-user-name'><b><?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?></b></h5>
	<h5 id='cummunity-time'><i><?=$args['created']?></i></h5>
					<div id='community-description' class="verdana">
						<?=  html_entity_decode((new \Parsedown())->text($args['contents']));?>
						<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
							<div class='alert info' style='color:white'>This topic has been closed by admin</div>
						<?php } ?>
					</div>
</div>
</div> 
<?php if ((new \App\Models\Account)->isAdmin()) {
		if ((new \App\Models\Community)->isClose($args['slug'])) {
	?>
   <form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>" method='post'>
		<input type='submit' name='open' class='btn zest' value='Open' style='color:white!important;' />
   </form>
	<?php } else { ?>
	    <form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>" method='post'>
			<input type='submit' name='close' class='btn zest' value='Close' style='color:white!important;' />
		</form>
	<?php }} ?>
  <div class="col m12 s12">
    <div class="row">
		 <h1 class="zest-title"><span class="page-title">Replies</span></h1>
        <?php
			$replies = (new \App\Models\Community)->communityReplies($args['slug']);
            foreach ($replies as $reply => $value) { ?>
			<div class="card">
				<div class="card-content">
					<img src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['username']);?>' id='community-user-image'>
					<h5 id='cummunity-user-name'><b><?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['name']?></b></h5>
					<h5 id='cummunity-time'><i><?=$value['created']?></i></h5>
					<div id='community-description' class="verdana">
						<?=  html_entity_decode((new \Parsedown())->text($value['contents']));?>
					</div>
				</div>
			</div>                  
    <?php  } ?>
	
	<?php if ((new \Zest\Auth\User())->isLogin()) {
			if (!(new \App\Models\Community)->isClose($args['slug'])) { ?>
	<h1 class="zest-title"><span class="page-title">Reply to this topic</span></h1>
		<div class="card">
			<div class="card-content">
				<form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>" method='post'>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="description" name='description' class="materialize-textarea"></textarea>
						</div>
					</div> 
					<input type='submit' name='submit' class='btn zest' value='submit' style='color:white!important;' />	
				</form>
			</div>
		</div>
	<?php }} else { ?>
		<div class='alert info' style='color:white'>You should login in order to reply this topic</div>		
	<?php } ?>		
  </div>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>
