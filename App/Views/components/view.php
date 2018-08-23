<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title><?=$args['title']?></title>
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
						<?=  (new \Michelf\Markdown())::defaultTransform($args['contents']);?>
						<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
							<div class='alert info' style='color:white'>This topic has been closed by admin</div>
						<?php } ?>
					</div>
</div>
</div> 
<div class="card" >
	<div class="card-content">
	<?php  $user = new \Zest\Auth\User;
		if ($user->isLogin()) {
			if ($args['ownerId'] === $user->loginUser()[0]['id']) { ?>
		<h5>Upload/Update component file (existing file will be override)</h5>		
		<form class="" action="<?=site_base_url()?>components/view/<?=$args['slug']?>" method='post' enctype="multipart/form-data">
			<div class="input-field col s10 offset-s1">
          		<input id="version" name='version' type="number" class="validate" autocomplete="off" placeholder="e.g: 1.2">
          		<label for="version">Version</label>
        	</div>
			<input type="file" name="file" />
			<p>Only (.zip) extension accpeted</p>
			<input type='submit' name='file' class='btn zest' value='Submit' style='color:white!important;' />
		</form>	
		<br><hr><br>	
	<?php }} ?>			
		<?php if ($args['componentFile'] !== NULL) { ?>
			<h5>Downlaod:</h5>
			<table>
				<tr>
					<th>Version</th>
					<th>Download</th>
				</tr>
				<tr>
					<td><?=$args['componentVersion']?></td>
					<td><a href="<?=site_base_url()?>read/zip/<?=$args['componentFile']?>">Download</a></td>
				</tr>
			</table>
		<?php } else { ?>
			<span class='alert info'>Sorry, Component file not uploaded by component owner</span>
		<?php } ?>
	</div>
</div>

<?php if ((new \App\Models\Account)->isAdmin()) {
		if ((new \App\Models\Community)->isClose($args['slug'])) {
	?>
   <form action="<?=site_base_url()?>components/view/<?=$args['slug']?>" method='post'>
		<input type='submit' name='open' class='btn zest' value='Open' style='color:white!important;' />
   </form>
	<?php } else { ?>
	    <form action="<?=site_base_url()?>components/view/<?=$args['slug']?>" method='post'>
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
				<form action="<?=site_base_url()?>components/view/<?=$args['slug']?>" method='post'>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="description" name='description' class="materialize-textarea"></textarea>
						</div>
					</div> 
					<input type='submit' name='submit' class='btn zest' value='submit' style='color:white!important;' />	
				</form>
			</div>
		</div>
	<?php }} ?>		
  </div>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>