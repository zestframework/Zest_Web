<?= \Zest\View\View::view('nav'); ?>
<title>404</title>
<section class="about-banner">
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12">
			<h1 class="text-white">
				Page not found			
			</h1>	
			<p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span> Sorry, that page doesn't exist</p>
		</div>	
	</div>
</div>
</section>
<?= \Zest\View\View::view('footer'); ?>

