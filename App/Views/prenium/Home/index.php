<?= \Zest\View\View::view('nav'); ?>
<meta name="author" content="Malik umer Farooq">
<meta name="description" content="<?= $args[3]['value'] ?>"/>
<meta name="keyword" content="<?= $args[4]['value'] ?>"/>
<title>Zest Framework</title>
<style type="text/css">
  .card {
    padding: 25px;
  }
</style>
        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Zest Framework</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <p class="breadcrumb-item">Zest is a simple yet powerful PHP MVC framework for rapid application development that is suited for small to medium scale apps and APIs.</p>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <section class="blog-area section_padding_70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h3>Why Zest?</h3>
                    <div class="card container" style="background-color: #f9f9ff!important">
                       <h5><i class="fa fa-star"></i> Framework with a small footprint</h5>
                       <p>Zest 3.0.0{dev} and Zest 2.0.3 has a 1.14 MB core file size.</p>
                    </div>
                    <hr>
                    <div class="card container" style="background-color: #f9f9ff!important">
                       <h5><i class="fa fa-send"></i> Simple solutions over complexity</h5>
                       <p>Zest encourages MVC, but does not force it on you.</p>
                    </div>
                    <hr>
                    <div class="card container" style="background-color: #f9f9ff!important">
                       <h5><i class="fa fa-tasks"></i> Built in libraries</h5>
                       <p>Zest Framework, provides large number of built in library such as Hashing, Encryption etc.</p>
                    </div>
                    <hr>
                    <div class="card container" style="background-color: #f9f9ff!important">
                       <h5><i class="fa fa-cog"></i> Nearly zero configuration</h5>
                       <p>Much of the Zest configuration is done by convention, for instance putting models in a "Models" folder. There are still a number of configuration options available, through scripts in the "Config" folder.</p>
                    </div>
                    <hr>
                    <div class="card container" style="background-color: #f9f9ff!important">
                       <h5><i class="fa fa-plug"></i> Components</h5>
                       <p>Zest Framework supports components, so a team work can done more fastly, a components has own Routes, Controllers, Models, Views and Middlewares.</p>
                    </div>
                 </div> 
                <div class="col-12 col-md-4">
                    <div class="zest-blog-sidebar">
                   <div class="latest-blog-posts mb-100">
                            <h5>Latest Blogs</h5>

                            <?php          
                      $pages = \App\Models\Pages::viewLimitedPagesBlog(7,0);
                    foreach ($pages as $page => $value) { ?>
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?=site_base_url()?>/read/image/<?=$value['image']?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <h6><a href="<?=site_base_url()?>/blog/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>"><?=$value['title']?></a></h6>
                                    <div class="post-meta">
                                        <h6>By <a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a>/<a href="#"><?=$value['created']?></a></h6>
                                    </div>
                                </div>
                            </div>
                            
                          <?php } ?>
                        </div>
                      </div></div></div></div></section>

    <section class="blog-area section_padding_20">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h3>Our Mission?</h3>
                    <p>Our mission is very marvelous, we are just trying to provide you best fastest, secured and marvelous php framework out of box.As given and everybody knows that Zest framework is very light in weight without thirdparty dependencies expect core, autolader and PHPUnit testing.</p>
                 </div> 
                <div class="col-12 col-md-4">
                    <div class="zest-blog-sidebar">
                   <div class="latest-blog-posts mb-100">
                            <h5>Latest Blogs</h5>

                            <?php          
             $pages = \App\Models\Pages::viewLimitedPagesNews(2,0);
            foreach ($pages as $page => $value) { ?>
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?=site_base_url()?>/read/image/<?=$value['image']?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <h6><a href="<?=site_base_url()?>/news/view/<?=$value['slug']?>/<?=urlencode($value['title'])?>"><?=$value['title']?></a></h6>
                                    <div class="post-meta">
                                        <h6>By <a href="<?=site_base_url()?>/@<?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['username'] ?>"><?= (new \Zest\Auth\User())->getByWhere('id',$value['ownerId'])[0]['name'] ?></a>/<a href="#"><?=$value['created']?></a></h6>
                                    </div>
                                </div>
                            </div>
                            
                          <?php } ?>
                        </div>
                      </div></div></div></div></section>                      
<?= \Zest\View\View::view('footer'); ?>



