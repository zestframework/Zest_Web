<?= \Zest\View\View::view('nav'); ?>
<title>Faq's</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="See all the questions and their answer about zest framework free of cost if any question feel free to ask in our community">
<meta name="keywords" lang="en" content="faqs,faq,questions,free,zest,framework,master,question,answer">
<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        Faq's        
      </h1> 
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!">Faq's</a></p>
    </div>  
  </div>
</div>
</section>
<div class='services-area section-gap container'>
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