    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="<?= site_base_url() ?>/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin//plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/css/style.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/css/themes/all-themes.css" rel="stylesheet" />
    <?= Zest\View\View::view('admin/nav'); ?>
    <title>Site Setting -Admin</title>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="container">
                    <br>
                     <div class="card">
                         <div class="container">
                             <h1>Site Setting</h1>
                             <form action="<?= site_base_url() ?>/admin/site/setting" method="post">
                                <div class="col-md-12">
                                    <b>Name</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='name' value="<?= App\Models\Site::get()[1]['value'] ?>">
                                    </div>
                                </div>
                                </div>                   
                                <div class="col-md-12">
                                    <b>Email</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='email' value="<?= App\Models\Site::get()[2]['value'] ?>">
                                    </div>
                                </div>
                                </div>                    
                                <div class="col-md-12">
                                    <b>Description</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='description' value="<?= App\Models\Site::get()[3]['value'] ?>">
                                    </div>
                                </div>
                                </div>   
                                <div class="col-md-12">
                                    <b>Keywords</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='keyword' value="<?= App\Models\Site::get()[4]['value'] ?>">
                                    </div>
                                </div>
                                </div>   
                                <div class="col-md-12">
                                    <b>Google Meta</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='gmeta' value="<?= App\Models\Site::get()[5]['value'] ?>">
                                    </div>
                                </div>
                                </div> 
                                <input type="submit" name="site" class="btn btn-primary" value="Submit"> 
                             </form>
                         </div>
                     </div>   
                     <div class="card">
                         <div class="container">
                             <h1>Site Status</h1>
                            <form action="<?= site_base_url() ?>/admin/site/setting" method="post">
                                <div class="col-md-12">
                                <p>
                                    <b>Sataus</b>
                                </p>
                                <select class="form-control show-tick" name='type'>
                                    <option value='normal' disabled>Plese Choose one type</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                    <option value="maintainus">Maintainus</option>
                                </select>
                                </div>   
                                <br><br><br><br>
                                <input type="submit" name="status" class="btn btn-primary" value="Submit">
                               </form>   

                         </div>
                     </div>                                        
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="<?= site_base_url() ?>/admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/node-waves/waves.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/autosize/autosize.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/momentjs/moment.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= site_base_url() ?>/admin//js/admin.js"></script>
    <script src="<?= site_base_url() ?>/admin/js/pages/forms/basic-form-elements.js"></script>
