<?= Zest\View\View::view('nav'); ?>
<title>Signup</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Register to enjoy in our services, to ask question upload your component in our components store">
<meta name="keywords" lang="en" content="signup,register,create an account,open,zest,framework,php,php7,php7.2,Zest framework">

        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Signup/Register</h2>
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
              <input type="text" class="form-control" id="name" placeholder="Name">
          </div>          
          <div class="col-12">
              <input type="text" class="form-control" id="username-signup" placeholder="Username">
          </div>
          <div class="col-12">
              <input type="email" class="form-control" id="email" placeholder="Email">
          </div>          
          <div class="col-12">
              <input type="password" class="form-control" id="password-signup" placeholder="Password">
          </div>
          <div class="col-12">
              <input type="password" class="form-control" id="confirm" placeholder="Password Confirm">
          </div>          
          <div class="col-12">
            <p class="" id='status'></p>
          </div>
          <div class="col-12">
            <p class="pull-right">By clicking signup, you agree to our <a href='<?=site_base_url()?>/site/terms' style=' color: #00576b!important;'>Terms and Conditions</a></p>
          </div>
          <div class="col-12">
            <a href="javascript:void(0)" id="submit-signup" class="btn zest-btn mt-50 pull-right">Signup</a>
          </div>
          <div class="col-12">
              <a href="<?= site_base_url(); ?>/account/login" class=" pull-right">Already have account?</a>         
          </div>  
      </div>
      </div>
    </section>     
<?= Zest\View\View::view('footer'); ?>