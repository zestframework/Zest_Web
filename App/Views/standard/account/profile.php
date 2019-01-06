<?= Zest\View\View::view('nav'); ?>
<title><?= $args['name'] ?></title>
<meta name="author" content="<?=$args['name']?>">
<meta name="keywords" lang="en" content="account,profile,<?=$args['name']?>,signin,open,zest,framework,php,php7,php7.2,Zest framework">
<br>




<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        Edit     
      </h1> 
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!">Edit</a></p>
    </div>  
  </div>
</div>
</section>
<div class='sample-text-area'>
  <div class="container">
     <h3 class="mb-10">Update profile</h3>
        <div class="mt-10">
          <input type="text" id="id" value="<?= $args['id'] ?>" hidden >
          <input type="text" name="name" id='name' placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" value="<?= $args['name'] ?>" required class="single-input">
        </div>
        <div class="mt-10">
          <input type="text" name="username-signup" id='username-signup' placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" value="<?= $args['username'] ?>" required class="single-input" disabled>
        </div>     
        <div class="mt-10">
          <input type="email" name="email" id='email' placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"  value="<?= $args['email'] ?>" required class="single-input" disabled>
        </div>                   
        <p class="mb-20"></p>
        <p class="" id='status-update'></p>
          <div class="button-group-area mt-40 text-right">
            <a href="javascript:void(0)" id="submit-update" class="genric-btn primary radius">Update</a>
          </div>               
    </div>    
</div>
<hr class="mb-20">
<div class='sample-text-area'>
  <div class="container">
        <h3 class="mb-10">Update password</h3>
        <input type="text" id="id" value="<?= $args['id'] ?>" hidden >
        <div class="mt-10">
          <input type="password" name="password" id='password' placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" " required class="single-input" >
        </div>     
        <div class="mt-10">
          <input type="password" name="confirm" id='confirm' placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input" >
        </div>                   
        <p class="mb-20"></p>
        <p class="" id='status-update-password'></p>
          <div class="button-group-area mt-40 text-right">
            <a href="javascript:void(0)" id="submit-update-password" class="genric-btn primary radius">Update</a>
          </div>               
    </div>    
</div>
<hr class="mb-20">
<div class='sample-text-area'>
  <div class="container">
        <h3 class="mb-10">Update Bio</h3>
        <div class="mt-10">
          <textarea class="single-textarea" id='bio' placeholder="Bio" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bio'" required><?=$args['bio']?></textarea>
        </div>                     
        <p class="mb-20"></p>
        <p class="" id='status-detail'></p>
          <div class="button-group-area mt-40 text-right">
            <a href="javascript:void(0)" id="submit-detail" class="genric-btn primary radius">Update</a>
          </div>               
    </div>    
</div>



<?= Zest\View\View::view('footer'); ?>