<?= Zest\View\View::view('nav'); ?>
<title>Signup</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Register to enjoy in our services, to ask question upload your component in our components store">
<meta name="keywords" lang="en" content="signup,register,create an account,open,zest,framework,php,php7,php7.2,Zest framework">

<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        Signup        
      </h1> 
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!"> Signup</a></p>
    </div>  
  </div>
</div>
</section>
<div class='sample-text-area'>
  <div class="container">
        <div class="mt-10">
          <input type="text" name="name" id='name' placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required class="single-input">
        </div>
        <div class="mt-10">
          <input type="text" name="username-signup" id='username-signup' placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
        </div>     
        <div class="mt-10">
          <input type="email" name="email" id='email' placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required class="single-input">
        </div>                   
        <div class="mt-10">
          <input type="password" name="password-signup" id='password-signup' placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
        </div> 
        <div class="mt-10">
          <input type="password" name="confirm" id='confirm' placeholder="Password-Repeat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password-Repeat'" required class="single-input">
        </div>         
        <p class="mb-20"></p>
        <p class="" id='status'></p>
        <p class="mb-10">By clicking signup, you agree to our <a href='<?=site_base_url()?>/site/terms' style=' color: #00576b!important;'>Terms and Conditions</a></p>
               <hr>
          <div class="button-group-area mt-40 text-right">
            <a href="<?= site_base_url(); ?>/account/login" class="genric-btn link radius">Already have account?</a>         
            <a href="javascript:void(0)" id="submit-signup" class="genric-btn primary radius">Signup</a>
          </div>               
    </div>    
</div>




<?= Zest\View\View::view('footer'); ?>