<?= \Zest\View\View::view('nav'); ?>
<title>Faq's</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="See all the questions and their answer about zest framework free of cost if any question feel free to ask in our community">
<meta name="keywords" lang="en" content="faqs,faq,questions,free,zest,framework,master,question,answer">
<div id='pages'>
    <h1 class="align-center">Faq's</h1>
</div> 
<div id='relax'></div>
<div id='white-board'>
  <h1 class="zest-title"><span class="page-title">Faq's</span></h1>
  <div class="col m12 s12">
    <div class="row">
        <?php
          $tItems = count(\App\Models\Pages::pageWhere('type','faq'));
          $page = $args['page'];
          $limit = 10;
          $url = "/faqs/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Pages::viewLimitedPagesfaq($limit,$start);
            foreach ($pages as $page => $value) { ?>
               <div class="container">
                  <a href="<?=site_base_url()?>/faq/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" style="color:#000!important">
                       <h1 id='faq-page-heading'><i class="material-icons" id='faq-icon'>arrow_forward</i> <?=$value['title']?></h1>             
                  </a>
               </div> 
    <?php  } ?>
  </div> <?=pagination($tItems,10,$args['page'],$url);?>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>