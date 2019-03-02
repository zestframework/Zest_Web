<?= Zest\View\View::view('nav'); ?>
<title>Login</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Login to enjoy in our services, to ask question upload your component in our components store">
<meta name="keywords" lang="en" content="login,signin,open,zest,framework,php,php7,php7.2,Zest framework">

        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Login</h2>
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
      <div class="contact-form-area container">
        <div class="row">
          <div class="col-12">
              <input type="text" class="form-control" id="username-login" placeholder="Username">
          </div>
          <div class="col-12">
              <input type="password" class="form-control" id="password-login" placeholder="Password">
          </div>
          <div class="col-12">
            <p class="" id='status'></p>
          </div>
          <div class="col-12">
            <a href="javascript:void(0)" id="submit-login" class="btn zest-btn mt-50 pull-right">Login</a>
          </div>
          <div class="col-12">
             <a href="<?= site_base_url(); ?>/account/reset-password" class="">Forget Password</a>
              <a href="<?= site_base_url(); ?>/account/signup" class=" pull-right">Don't have account?</a>  
          </div>  
      </div>
      </div>
    </section> 

<?= Zest\View\View::view('footer'); ?>