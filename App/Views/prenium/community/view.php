<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<meta name="author" content="<?=(new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['name']?>">
<meta name="keywords" lang="en" content="community,forum,free , questions , parts , ,<?= $args['title'] ?>,zest,framework,php,php7,php7.2,Zest framework">
<style type="text/css">
	body {
		background-color: #f9f9ff!important;
	}
</style>
          <script src='<?= site_base_url() ?>/tinymce/tinymce.min.js'></script>
        <script>
tinymce.init({
  selector: 'textarea#desc',
  theme: 'silver',
  plugins: 'advlist anchor autolink autoresize autosave code codesample colorpicker image code emoticons fullpage fullscreen help hr imagetools importcss insertdatetime legacyoutput link lists media paste pagebreak preview print save quickbars searchreplace  spellchecker tabfocus',
  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment | image code',
    mobile: {
      theme: 'mobile',
      plugins: [ 'autosave', 'lists', 'autolink', 'image', 'code', 'emoticons', 'imagetool', 'paste' ]
    },  
     convert_urls: false,
     images_upload_url: "<?=site_base_url()?>/uploader/image",
     image_caption: true,
     spellchecker_dialog: true,
     importcss_append: true,
     height: 400,
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', "<?=site_base_url()?>/uploader/image");
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        formData.append('type','community');
        xhr.send(formData);
    },

 });
  </script>
	

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
    <h5 id='cummunity-time'><i><?= (new \Zest\Common\Formats())->friendlyTime($args['created'])?></i></h5>
		<?php if ((new \App\Models\Account)->isAdmin()) { ?>
	  <div class="dropdown">
  <button class="btn zest-btn pull-right" type="button" data-toggle="dropdown">Actions</button>
    <ul class="dropdown-menu" style="list-style-type: none!important;color:black!important; padding: 6px!important;">
                  	<?php if ((new \App\Models\Community)->isClose($args['slug'])) { ?>
                      <li><a class="" id='community-top-open-topic' href='javascript:void(0)' data-id="<?=site_base_url()?>/community/view/<?=$args['slug']?>/1">Open</a></li>
                    <?php } else { ?>
                      <li><a class="" id='community-top-close-topic' href='javascript:void(0)' data-id="<?=site_base_url()?>/community/view/<?=$args['slug']?>/1">Close</a></li>	
                    <?php } ?>  
                    <li><a class="" id='community-top-delete-topic' href='javascript:void(0)' data-id="<?=site_base_url()?>/community/view/<?=$args['slug']?>/1">Move to trash</a></li>	
               
            </ul></div>
        <?php  } ?>    
		<p class="text-right" id=''><?=  decode_html_entity($args['contents']);?></p>
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
			   $tItems = count((new \App\Models\Community)->communityReplies($args['slug']));
          $page = $args['page'];
          $limit = 6;
          $url = "/community/view/".$args['slug'].'/';
          if($page == 1){
            $start = 0;
          } else{
            $start = ($page - 1) * $limit;
          }
          $replies = (new \App\Models\Community)->limitedCommunityReplies($limit,$start, $args['slug']);
            foreach ($replies as $reply => $value) { ?>
<div class="card">
	<div class="card-body">
	<img class="" src='<?=\App\Models\Avatar::getAvaterUrlByUsername((new \Zest\Auth\User)->getByWhere('id',$args['ownerId'])[0]['username']);?>' id='community-user-image'>
  	<div id='community-topic'>
	  	<h5 id=''><b><a href="<?=site_base_url()?>/@<?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['username']?>" ><?=(new \Zest\Auth\User)->getByWhere('id',$value['ownerId'])[0]['name']?></a>
	  	</b></h5>
		<h5 id='cummunity-time'><i><?= (new \Zest\Common\Formats())->friendlyTime($value['created'])?></i></h5>
		<i class="fa fa-delete"></i>
		<p class="text-right" id=''><?=  decode_html_entity($value['contents']);?></p>
  	</div>
  </div>
</div>
<?php } ?>
      <div class="zest-pagination-area section_padding_100">
          <nav>
             <?=pagination($tItems,$limit,$args['page'],$url);?>
          </nav>
      </div>    

		<?php if ((new \Zest\Auth\User())->isLogin()) {
			if (!(new \App\Models\Community)->isClose($args['slug'])) { ?>
	<div class="card">
		<div class="card-body">
      <h3>Reply to this topic</h3>
			<form action="<?=site_base_url()?>/community/view/<?=$args['slug']?>/1" method="post">
				<textarea id="desc" name='description' class="materialize-textarea"></textarea>
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

<?= view('footer'); ?>

<script type="text/javascript">

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