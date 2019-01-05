<?= \Zest\View\View::view('nav'); ?>
<title>Blogs</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Learn all blogs related to zest framework free of cost if any question feel free to ask in our community">
<meta name="keywords" lang="en" content="Blogs,blog,blogger,free,zest,framework,master,articles,article">
<div id='pages'>
    <h1 class="align-center">Blogs</h1>
</div> 
<div id='relax'></div>
<div id='relax-plater'>
  <h1 class="zest-title"><span class="page-title">Blogs</span></h1>
  <div class="col m12 s12">
    <div class="row">
        <?php
          $tItems = count(\App\Models\Pages::pageWhere('type','blog'));
          $page = $args['page'];
          $limit = 6;
          $url = "/blogs/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Pages::viewLimitedPagesBlog($limit,$start);
            foreach ($pages as $page => $value) { ?>
              <a href="<?=site_base_url()?>/blog/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>" style="color:#000!important">
                <div class="card">
                    <div class="card-content">
                        <h4><?= $value['title'] ?></h4>
                        <p class="verdana"><?= substr($value['scontent'], 0, 255) ?></p>
                    </div>
                </div>                  
              </a>
    <?php  } ?>
  </div> <?=pagination($tItems,$limit,$args['page'],$url);?>
</div>
</div>
<?= \Zest\View\View::view('footer'); ?>