<?= Zest\View\View::view('nav'); ?>
<title>Reset your password</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Reset your password if you forget, dont worry it will not take a long">
<meta name="keywords" lang="en" content="reset,password,forget,open,zest,framework,php,php7,php7.2,Zest framework">

        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Password Reset</h2>
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
      <form action="<?=site_base_url()?>/account/reset-password/process" method='post' class="contact-form-area container">
        <div class="row">
          <div class="col-12">
              <input type="email" class="form-control" id="email" name='email' placeholder="Email">
          </div>
          <div class="col-12">
            <input type="submit" name="submit" class="btn zest-btn mt-50 pull-right" value="Reset password" >
          </div>
      </div>
      </form>
    </section> 

<?= Zest\View\View::view('footer'); ?>