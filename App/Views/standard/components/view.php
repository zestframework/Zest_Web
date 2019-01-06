<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title><?=$args['title']?></title>
<meta name="author" content="<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?>">
<meta name="keywords" lang="en" content="component,components,add on , plugin , parts , ,<?= $args['title'] ?>,zest,framework,php,php7,php7.2,Zest framework">

      <section class="relative about-banner"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                <?=$args['title']?>   
              </h1> 
              <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="<?=site_base_url()?>/components/1">Component </a> <span class="lnr lnr-arrow-right"></span> <a href="javascript:void(0)"> <?=$args['title']?></a></p>
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
   <form action="<?=site_base_url()?>/components/view/<?=$args['slug']?>" method='post'>
		<input type='submit' name='open' class='genric-btn primary radius' value='Open' />
   </form>
	<?php } else { ?>
	    <form action="<?=site_base_url()?>/components/view/<?=$args['slug']?>" method='post'>
			<input type='submit' name='close' class='genric-btn primary radius' value='Close'  />
		</form>
	<?php }} ?>
<span class="mt-10"></span>  
</div> 

<div class="simple-text-area mt-10">
	<div class="card" >
	<div class="card-content">
	<?php  $user = new \Zest\Auth\User;
		if ($user->isLogin()) {
			if ($args['ownerId'] === $user->loginUser()[0]['id']) { ?>
		<h5>Upload/Update component file (existing file will be override)</h5>		
		<form class="" action="<?=site_base_url()?>/components/view/<?=$args['slug']?>" method='post' enctype="multipart/form-data">
        <div class="mt-10">
          <input type="text" name="version" id='version' placeholder="Version e.g 1.1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Version e.g 1.1'" required class="single-input" style="background-color: lightgray;color:white">
        </div>
        <div class="mt-10">
          <input type="file" name="file" id='file' required class="single-input">
        </div>
           <p>Only (.zip) extension accpeted</p>
			<input type='submit' name='file' class='genric-btn primary radius' value='Submit' style='color:white!important;' />
		</form>	
		<br><hr><br>	
	<?php }} ?>			
		<?php if ($args['componentFile'] !== NULL) { ?>
<div class="section-top-border">
						<h3 class="mb-30">Table</h3>
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">#</div>
									<div class="country">Version</div>
									<div class="visit">Download</div>
								</div>
								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"><?=$args['componentVersion']?></div>
									<div class="visit"><a class="genric-btn primary radius" href="<?=site_base_url()?>read/zip/<?=$args['componentFile']?>">Download</a></div>
			
								</div></div></div></div>		
		<?php } else { ?>
			<p class='alert alert-info container'>Sorry, Component file not uploaded by component owner</p>
		<?php } ?>
	</div>
</div>
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
			<form action="<?=site_base_url()?>/components/view/<?=$args['slug']?>">
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

