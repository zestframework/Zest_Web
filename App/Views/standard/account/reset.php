<?= Zest\View\View::view('nav'); ?>
<title>Reset your password</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" lang="en" content="Reset your password if you forget, dont worry it will not take a long">
<meta name="keywords" lang="en" content="reset,password,forget,open,zest,framework,php,php7,php7.2,Zest framework">

<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        Reset your password        
      </h1> 
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!"> Reset your password</a></p>
    </div>  
  </div>
</div>
</section>
<div class='sample-text-area'>
  <form action="<?=site_base_url()?>/account/password/reset/process" method='post' class="container">
        <input type="text" name="id" value="<?=$args['id']?>" hidden>
        <input type="text" name="token" value="<?=$args['token']?>" hidden>
        <div class="mt-10">
          <input type="password" name="password"  placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
        </div>
          <div class="mt-10">

          <input type="password" name="confirm"  placeholder="Repeat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repeat'" required class="single-input">
        </div>
        <p class="mb-20"></p>
          <div class="button-group-area mt-40 text-right">
             <input type="submit" name="submit" class="genric-btn link radius" value="Reset password" >
          </div>               
    </form>    
</div>
<?= Zest\View\View::view('footer'); ?>