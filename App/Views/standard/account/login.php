<?= Zest\View\View::view('nav'); ?>
<title>Login</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Login to enjoy in our services, to ask question upload your component in our components store">
<meta name="keywords" lang="en" content="login,signin,open,zest,framework,php,php7,php7.2,Zest framework">

<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        Login        
      </h1> 
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!"> Login</a></p>
    </div>  
  </div>
</div>
</section>
<div class='sample-text-area'>
  <div class="container">
        <div class="mt-10">
          <input type="text" name="username-login" id='username-login' placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
        </div>
        <div class="mt-20">
          <input type="text" name="password-login" id='password-login' placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
        </div> 
        <p class="mb-20"></p>
        <p class="" id='status'></p>
          <div class="button-group-area mt-40 text-right">
            <a href="<?= site_base_url(); ?>/account/signup" class="genric-btn link radius">Don't have account?</a>         
            <a href="javascript:void(0)" id="submit-login" class="genric-btn primary radius">Login</a>
            <a href="<?= site_base_url(); ?>/account/reset-password" class="genric-btn link radius">Forget Password</a>
          </div>               
    </div>    
</div>
<?= Zest\View\View::view('footer'); ?>