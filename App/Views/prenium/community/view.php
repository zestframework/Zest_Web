<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title><?=$args['title']?></title>
<meta name="author" content="<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?>">
<meta name="keywords" lang="en" content="community,forum,free , questions , parts , ,<?= $args['title'] ?>,zest,framework,php,php7,php7.2,Zest framework">
<style type="text/css">
	body {
		background-color: #f9f9ff!important;
	}
</style>
        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2><?=$args['title']?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=site_base_url()?>">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- ***** Breadcumb Area End ***** -->
<div class="container">
<div class="card">
	<div class="card-body">
	<img class="" src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User())->getByWhere('id',$args['ownerId'])[0]['username']);?>' id='community-user-image'>
  	<div id='community-topic'>
	  	<h5 id=''><b><a href="<?=site_base_url()?>/@<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']?>" ><?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?></a></b>	</h5>
	  		<i>Posted in - <?=$args['category']?></i>
		<h5 id='cummunity-time'><i><?=$args['created']?></i></h5>
		<?php if ((new \App\Models\Account)->isAdmin()) { ?>
	  <div class="dropdown">
  <button class="btn zest-btn pull-right" type="button" data-toggle="dropdown">Actions</button>
    <ul class="dropdown-menu" style="list-style-type: none!important;color:black!important; padding: 6px!important;">
                  	<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
                      <li><a class="" id='community-top-open-topic' href='javascript:void(0)' data-id="<?=site_base_url()?>/community/view/<?=$args['slug']?>">Open</a></li>
                    <?php } else { ?>
                      <li><a class="" id='community-top-close-topic' href='javascript:void(0)' data-id="<?=site_base_url()?>/community/view/<?=$args['slug']?>">Close</a></li>	
                    <?php } ?>  
                    <li><a class="" id='community-top-delete-topic' href='javascript:void(0)' data-id="<?=site_base_url()?>/community/view/<?=$args['slug']?>">Move to trash</a></li>	
               
            </ul></div>
        <?php  } ?>    
		<p class="text-right" id=''><?=  html_entity_decode((new \Parsedown())->text($args['contents']));?></p>
  			<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
							<div class='alert alert-info' style='color:black'>This topic has been closed by admin</div>
			<?php } ?>
  	</div>
  </div>
<span class="mt-10"></span>  
</div> 

<div class='blog-area section_padding_100'>
	<div class="container">
		<h2 class="mb-10">Replies</h2>
		 <?php
			$replies = (new \App\Models\Community)->communityReplies($args['slug']);
            foreach ($replies as $reply => $value) { ?>
<div class="card">
	<div class="card-body">
	<img class="" src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']);?>' id='community-user-image'>
  	<div id='community-topic'>
	  	<h5 id=''><b><a href="<?=site_base_url()?>/@<?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['username']?>" ><?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['name']?></a>
	  	</b></h5>
		<h5 id='cummunity-time'><i><?=$value['created']?></i></h5>
		<i class="fa fa-delete"></i>
		<p class="text-right" id=''><?=  html_entity_decode((new \Parsedown())->text($value['contents']));?></p>
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
				<input type='submit' name='submit' class='btn zest-btn mt-50 pull-right' value='Reply'/>
			</form>
		</div>	
	</div>
	<?php }} else { ?>
		<div class='alert alert-info' style='color:black'>You should login in order to reply in this topic</div>		
	<?php } ?>
	</div>		
</div>	
</div>

<?= \Zest\View\View::view('footer'); ?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>

<script type="text/javascript">
	$("#community-top-close-topic").click(function(){
		var link = $("#community-top-close-topic").attr('data-id');
		$.post(link, {close:'close'},function(e){
			window.location = link;
		});
	});	
	$("#community-top-open-topic").click(function(){
		var link = $("#community-top-open-topic").attr('data-id');
		$.post(link, {open:'open'},function(e){
			window.location = link;
		});
	});		
	$("#community-top-delete-topic").click(function(){
		var link = $("#community-top-delete-topic").attr('data-id');
		if (confirm("Are you sure?")) {
			$.post(link, {delete:'delete'},function(e){
				window.location = url+"community/1";
			});
		}
	});		
</script>