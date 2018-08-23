<?= \Zest\View\View::view('nav'); ?>
<title><?=$args['title']?></title>
<style type="text/css">
  body {
    background-color: #fff!important;
  }
</style>
<div id='pages'>
    <h1 class="align-center"><?=$args['title']?></h1>
</div> 
<div class="container">
  <h1 class="zest-title"><span class="page-title"><?=$args['title']?></span></h1>
  <p class="verdana"><p class="verdana"><?= (new \Michelf\Markdown())::defaultTransform($args['content']);?></p></p>
</div>
<div id='white-board'></div> 
<?= \Zest\View\View::view('footer'); ?>