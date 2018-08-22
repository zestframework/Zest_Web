<?= \Zest\View\View::view('nav'); ?>
<title>Faq's</title>
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
          $url = site_base_url()."/";
          $paginator = new \App\Classes\Pagination($tItems,10,$url,$page,'faqs');
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Pages::viewLimitedPagesfaq($limit,$start);
            foreach ($pages as $page => $value) { ?>
               <div class="container">
                  <a href="<?=site_base_url()?>faq/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" style="color:#000!important">
                       <h1 id='faq-page-heading'><i class="material-icons" id='faq-icon'>arrow_forward</i> <?=$value['title']?></h1>             
                  </a>
               </div> 
    <?php  } ?>
  </div>

  <?php 

if ($paginator->getNumPages() > 1): ?>
    <ul class="pagination">
        <?php if ($paginator->getPrevUrl()): ?>
            <li><a href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; First</a></li>
        <?php endif; ?>

        <?php foreach ($paginator->getPages() as $page): ?>
            <?php if ($page['url']): ?>
                <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                    <a href="<?php echo $page['num']; ?>"><?php echo $page['num']; ?></a>
                </li>
            <?php else: ?>
                <li class=""><a href='<?= "$urls/".$page['num'] ?>'><span><?php echo $page['num']; ?></a></span></li>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($paginator->getNextUrl()): ?>
            <li><a href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>