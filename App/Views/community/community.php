<?= \Zest\View\View::view('nav'); ?>
<title>Community</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" content="This is free community about Zest Framework ask any question that is in your mind">
<meta name="keywords" lang="en" content="community,zest,framework,php,php7,php7.2,Zest framework">
<div id='pages'>
    <h1 class="align-center">Community</h1>
</div> 
<div id='relax'></div>
<div id='white-board'>
  <h1 class="zest-title"><span class="page-title">Community</span></h1>
  <div class="col m12 s12">
    <div class="row">
        <?php
          $tItems = count(\App\Models\Community::communityAll());
          $page = $args['page'];
          $limit = 10;
          $url = "/community/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Community::viewLimitedCommunity($limit,$start);
            foreach ($pages as $page => $value) { ?>
               <div class="container">
                  <a href="<?=site_base_url()?>/community/view/<?=$value['slug']?>" style="color:#000!important">
					   <?php 
						 $count = count((new \App\Models\Community)->communityReplies($value['slug']));
						 $class = 'topic-answer';
							if ($count == '' || empty($count) || $count === null) {
								$count = 0;
								$class = 'topic-answer-no';
							}
					   ?>
					   <p class='<?=$class?>' style='color:white'><?= $count ?></p><h1 class='community-page-title' id='faq-page-heading'>
					   <i class="material-icons" id='faq-icon'>arrow_forward</i>  <?=$value['title']?></h1>             
                  </a>
               </div> 
    <?php  } ?>
  </div> <?=pagination($tItems,10,$args['page'],$url);?>
	
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>