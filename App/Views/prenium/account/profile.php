<?= Zest\View\View::view('nav'); ?>
<title><?= $args['name'] ?></title>
<meta name="author" content="<?=$args['name']?>">
<meta name="keywords" lang="en" content="account,profile,<?=$args['name']?>,signin,open,zest,framework,php,php7,php7.2,Zest framework">

        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Profile Edit</h2>
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
        <h3 class="mb-10">Update profile</h3>
        <div class="row">
          <input type="text" id="id" value="<?= $args['id'] ?>" hidden >
          <div class="col-12">
              <input type="text" class="form-control" id="name" placeholder="Name" value="<?= $args['name'] ?>">
          </div>
          <div class="col-12">
              <input type="Username" class="form-control" id="password-login" placeholder="Username" value="<?= $args['username'] ?>" disabled>
          </div>
          <div class="col-12">
              <input type="email" class="form-control" id="password-login" placeholder="Email" value="<?= $args['email'] ?>" disabled>
          </div>          
          <div class="col-12">
            <p class="" id='status-update'></p>
          </div>
          <div class="col-12">
            <a href="javascript:void(0)" id="submit-update" class="btn zest-btn mt-50 pull-right">Update</a>
          </div>
      </div>
      </div>
    </section> 
    <section class="section_padding_100">
      <div class="contact-form-area container">
        <h3 class="mb-10">Update password</h3>
        <div class="row">
          <input type="text" id="id" value="<?= $args['id'] ?>" hidden >
          <div class="col-12">
              <input type="password" class="form-control" id="password" placeholder="Password"">
          </div>
          <div class="col-12">
              <input type="password" class="form-control" id="confirm" placeholder="Repeat"">
          </div>
          <div class="col-12">
            <p class="" id='status-update-password'></p>
          </div>
          <div class="col-12">
            <a href="javascript:void(0)" id="submit-update-password" class="btn zest-btn mt-50 pull-right">Update Password</a>
          </div>
      </div>
      </div>
    </section> 

    <section class="section_padding_100">
      <div class="contact-form-area container">
        <h3 class="mb-10">Update Bio</h3>
        <div class="row">
          <input type="text" id="id" value="<?= $args['id'] ?>" hidden >
          <div class="col-12">
              <textarea name="bio" class="form-control" id="bio" cols="30" rows="10" placeholder="Bio"><?=$args['bio']?></textarea>
          </div>
          <div class="col-12">
            <p class="" id='status-detail'></p>
          </div>
          <div class="col-12">
            <a href="javascript:void(0)" id="submit-detail" class="btn zest-btn mt-50 pull-right">Update Bio</a>
          </div>
      </div>
      </div>
    </section>



<?= Zest\View\View::view('footer'); ?>