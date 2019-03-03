<?= Zest\View\View::view('nav'); ?>
<title><?= $args['name'] ?></title>

    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2><?=$args['name']?></h2>
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
                <div class="col-12 col-md-8">
                    <h3><?=$args['name']?></h3>
                    <img src="<?=model('Avatar')->getAvaterUrlByUsername($args['username'])?>" class="img-circle" style="width: 250px; height: 200px">
                    <p><?=$args['bio']?>.</p>
                 </div> </div></div></section>                      


<?= Zest\View\View::view('footer'); ?>