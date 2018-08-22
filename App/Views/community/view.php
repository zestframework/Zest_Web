<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<div id='pages'>
    <h1 class="align-center"><?=$args['title']?></h1>
</div> 
<div id='relax'></div>
<div id='relax-course-plater'>
  <h1 class="zest-title"><span class="page-title"><?=$args['title']?></span></h1>
<div class="card" >
<div class="card-content">
	<img src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']);?>' id='community-user-image'>
	<h5 id='cummunity-user-name'><b><?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?></b></h5>
	<h5 id='cummunity-time'><i><?=$args['created']?></i></h5>
					<div id='community-description' class="verdana">
						<?=  (new \Michelf\Markdown())::defaultTransform($args['contents']);?>
						<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
							<div class='alert info' style='color:white'>This topic has been closed by admin</div>
						<?php } ?>
					</div>
</div>
</div> 
<?php if ((new \App\Models\Account)->isAdmin()) {
		if ((new \App\Models\Community)->isClose($args['slug'])) {
	?>
   <form action="<?=site_base_url()?>community/view/<?=$args['slug']?>" method='post'>
		<input type='submit' name='open' class='btn waves-effect waves-light' value='Open' style='color:white!important;' />
   </form>
	<?php } else { ?>
	    <form action="<?=site_base_url()?>community/view/<?=$args['slug']?>" method='post'>
			<input type='submit' name='close' class='btn waves-effect waves-light' value='Close' style='color:white!important;' />
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
						<?=  (new \Michelf\Markdown())::defaultTransform($value['contents']);?>
					</div>
				</div>
			</div>                  
    <?php  } ?>
	
	<?php if ((new \Zest\Auth\User())->isLogin()) {
			if (!(new \App\Models\Community)->isClose($args['slug'])) { ?>
	<h1 class="zest-title"><span class="page-title">Reply to this topic</span></h1>
		<div class="card">
			<div class="card-content">
				<form action="<?=site_base_url()?>community/view/<?=$args['slug']?>" method='post'>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="textarea1" name='description' class="materialize-textarea"></textarea>
						<label for="description">Description (markdown supported)</label>
						</div>
					</div> 
					<input type='submit' name='submit' class='btn waves-effect waves-light' value='submit' style='color:white!important;' />	
				</form>
			</div>
		</div>
	<?php }} ?>		
  </div>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>