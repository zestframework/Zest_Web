    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <script src="<?= site_base_url(); ?>tinymce/tinymce.min.js" ></script>
    <link href="<?= site_base_url() ?>admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin//plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin/plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin/css/style.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>admin/css/themes/all-themes.css" rel="stylesheet" />
    <?= \Zest\View\View::view('admin/nav'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <title>Add pages -Admin</title>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="container">
                    <br>
                     <div class="card">
                         <div class="container">
                             <h1>Pages</h1>
                             <form action="<?= site_base_url() ?>admin/page/add" method="post">
                                <div class="col-md-8">
                                    <b>Title</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='title' >
                                    </div>
                                </div>
                                </div>       
                           <div class="col-md-8">
                                <p>
                                    <b>Type</b>
                                </p>
                                <select class="form-control show-tick" name='type'>
                                    <option value='blog' disabled>Plese Choose one type</option>
                                    <option value="blog">Blog</option>
                                    <option value="faq">FAQ's</option>
                                </select>
                                </div>
                                <div class="col-md-8">
                                    <b>Keywords (seperate by comma)</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='keyword' >
                                    </div>
                                </div>
                                </div>          
                                <div class="col-md-8">
                                    <b>Short Contents</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='scontent' >
                                    </div>
                                </div>
                                </div>                  
                                <div class="col-md-8">
                                    <b>Contents</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea id="desc" name='contents'></textarea>
                                    </div>
                                </div>
                                </div> 
                                <div class="col-md-8">
                                    <br>
                                    <input type="submit" name="page" class="btn btn-primary" value="Create New Page"> 
                                    <br><br>
                                </div>
                             </form>
                         </div>
                     </div>                              
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="<?= site_base_url() ?>admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/node-waves/waves.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/autosize/autosize.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/momentjs/moment.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?= site_base_url() ?>admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= site_base_url() ?>admin//js/admin.js"></script>
    <script src="<?= site_base_url() ?>admin/js/pages/forms/basic-form-elements.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
    var simplemde = new SimpleMDE({ element: document.getElementById("desc") });
    </script>