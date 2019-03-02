<?= \Zest\View\View::view('nav'); ?>
<title>Contribute</title>
        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Contribute</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=site_base_url()?>">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->
    <section class="section_padding_100">
	<div class="container">
	<h3 class="mb-10">How to contribute and report an issue on GitHub?</h3>
	<h4 class="mb-10">Requirements:</h4>
		<p class=''>To report an issue on Github, the following conditions must be followed:</p>
		<ul class="list-group">
			<li class="list-group-item">Zest Framework version</li>
			<li class="list-group-item">PHP version</li>
			<li class="list-group-item">Error message</li>
			<li class="list-group-item">Error Log</li>
			<li class="list-group-item">Issue screenshots</li>
			<li class="list-group-item">Apache version (optional)</li>
			<li class="list-group-item">MySQL version (if possible)</li>
		</ul>
		<h4 class="mb-10">Before submitting a bug report</h4>
		<ul class="list-group">
			<li class="list-group-item">Check whether the issue has already been submitted.</li>
		</ul>		
		
		<h4 class="">After submitting a bug report</h4>
		<ul class="list-group">
			<li class="list-group-item">Wait until core team reply to you.</li>
			<li class="list-group-item">Do what core-team says. Don't argue with core team.</li>
		</ul>		
			<h4 class="mb-10">How to contribute on GitHub?</h4>
			<p class=''>We always welcome contributors if they follow our guidelines</p>
		<ol class="list-group">
			<li class="list-group-item"><span>You never allow add third-party Composer dependencies or classes</span></li>
			<li class="list-group-item"><span>You allow to improve existing features or add new features</span></li>
			<li class="list-group-item"><span>You allow update Zest framework code or core code</span></li>
			<li class="list-group-item"><span>When you want send pull request. You have provide brief description about code either you update exsting code or adding new feature.</span></li>
			<li class="list-group-item"><span><a href='https://github.com/Softhub99/Zest'>Zest</a></span></li>
			<li class="list-group-item"><span><a href='https://github.com/Softhub99/Zest_Framework'>Core Files</a></span></li>
		</ol>
		<h6 style="color:red">[NOTE: The conditions above applied all member including core]</h6>
	</div>	
</section>
<?= \Zest\View\View::view('footer'); ?>