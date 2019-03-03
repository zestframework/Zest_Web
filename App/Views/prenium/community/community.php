<?= \Zest\View\View::view('nav'); ?>
<title>Community</title>
<meta name="author" content="Malik Umer Farooq">
<meta name="description" content="This is free community about Zest Framework ask any question that is in your mind">
<meta name="keywords" lang="en" content="community,zest,framework,php,php7,php7.2,Zest framework">
        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Community</h2>
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
    <section class="blog-area section_padding_100">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 posts-list">

        <?php
          $tItems = count(\App\Models\Community::communityAll());
          $page = $args['page'];
          $limit = 10;
          $url = "/community/";
          if($page == 1){
            $start = 0;
          }else{
            $start = ($page - 1) * $limit;
          }
          $pages = \App\Models\Community::viewLimitedCommunity($limit,$start);
            foreach ($pages as $page => $value) { ?>
          <div class="single-post row mt-10">
                <div class="col-lg-3 col-md-3 meta-details">
                  <div class="user-details row">
                    <p class="user-name col-lg-12 col-md-12 col-6"><a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a> <span class="lnr lnr-user"></span></p>
                    <p class="date col-lg-12 col-md-12 col-6"><?=count((new \App\Models\Community)->communityReplies($value['slug']))?> <span class="fa fa-reply"></span></p></div>
                </div>
                <div class="col-lg-9 col-md-9 ">
                  <a class="posts-title" href="<?=site_base_url()?>/community/view/<?=$value['slug']?>"><h3><?=$value['title']?></h3></a>
                </div>
              </div>    
              <hr>                        
    <?php  } ?>
      <div class="zest-pagination-area">
          <nav>
             <?=pagination($tItems,$limit,$args['page'],$url);?>
          </nav>
      </div>  

  </div></div></div></section> 

	
<?= \Zest\View\View::view('footer'); ?>