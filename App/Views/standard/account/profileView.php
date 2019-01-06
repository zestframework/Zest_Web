<?= Zest\View\View::view('nav'); ?>
<title><?= $args['name'] ?></title>
<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        <?=$args['name']?>        
      </h1> 
                 <?php if (!empty($args['pImg']) || $args['pImg'] !== null) { ?> 
             <img class='single-gallery-image' src="<?=site_base_url()?>/read/image/<?= $args['pImg'] ?>" id='profileImg'>
           <?php } else { ?>
             <img class='single-gallery-image' src="<?=site_base_url()?>/standard/image/user.jpg" id='profileImg'>
           <?php } ?>
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!"> <?=$args['name']?></a></p>
    </div>  
    <p class="mb-10 text-center text-white container"><?=$args['bio']?></p>
  </div>
</div>
</section>
<?= Zest\View\View::view('footer'); ?>