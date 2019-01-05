<?= \Zest\View\View::view('nav'); ?>
<title>Components</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" content="Download any component for your Zest Framework">
<meta name="keywords" lang="en" content="components,zest,framework,php,php7,php7.2,Zest framework">
<div id='pages'>
    <h1 class="align-center">Components</h1>
</div> 
<div id='relax'></div>
<div id='white-board'>
  <h1 class="zest-title"><span class="page-title">components</span></h1>
  <div class="col m12 s12">
    <div class="row">
        <?php
          $tItems = count(\App\Models\Components::componentAll());
          $page = $args['page'];
          $limit = 10;
          $url = "/Components/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = (new \App\Models\Components)->viewLimitedComponent($limit,$start);
            foreach ($pages as $page => $value) { ?>
               <div class="container">
                  <a href="<?=site_base_url()?>/components/view/<?=$value['slug']?>" style="color:#000!important">
					   <h1 class='' id='faq-page-heading'>
					   <i class="material-icons" id='faq-icon'>arrow_forward</i>  <?=$value['title']?></h1>             
                  </a>
               </div> 
    <?php  } ?>
  </div><?=pagination($tItems,10,$args['page'],$url);?>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>