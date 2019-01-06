<?= \Zest\View\View::view('nav'); ?>
<title>Contribute</title>
<section class="about-banner">
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12">
			<h1 class="text-white">
				Contribute				
			</h1>	
			<p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!"> Contribute</a></p>
		</div>	
	</div>
</div>
</section>
<div class='services-area section-gap'>
	<div class="container">
	<h3 class="mb-10">How to contribute and report an issue on GitHub?</h3>
	<h4 class="mb-10">Requirements:</h4>
		<p class=''>To report an issue on Github, the following conditions must be followed:</p>
		<ul>
			<li>Zest Framework version</li>
			<li>PHP version</li>
			<li>Error message</li>
			<li>Error Log</li>
			<li>Issue screenshots</li>
			<li>Apache version (optional)</li>
			<li>MySQL version (if possible)</li>
		</ul>
		<h4 class="mb-10">Before submitting a bug report</h4>
		<ul>
			<li>Check whether the issue has already been submitted.</li>
		</ul>		
		
		<h4 class="mb-10">After submitting a bug report</h4>
		<ul>
			<li>Wait until core team reply to you.</li>
			<li>Do what core-team says. Don't argue with core team.</li>
		</ul>		
			<h4 class="mb-10">How to contribute on GitHub?</h4>
			<p class=''>We always welcome contributors if they follow our guidelines</p>
		<ol class="ordered-list">
			<li><span>You never allow add third-party Composer dependencies or classes</span></li>
			<li><span>You allow to improve existing features or add new features</span></li>
			<li><span>You allow update Zest framework code or core code</span></li>
			<li><span>When you want send pull request. You have provide brief description about code either you update exsting code or adding new feature.</span></li>
			<li><span><a href='https://github.com/Softhub99/Zest'>Zest</a></span></li>
			<li><span><a href='https://github.com/Softhub99/Zest_Framework'>Core Files</a></span></li>
		</ol>
		<h6 style="color:red">[NOTE: The conditions above applied all member expect core]</h6>
	</div>	
</div>
<div id='white-board'></div> 
<?= \Zest\View\View::view('footer'); ?>