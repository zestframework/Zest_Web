    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="<?= site_base_url() ?>admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>admin/css/style.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>admin/css/themes/all-themes.css" rel="stylesheet" />
    <?= \Zest\View\View::view('admin/nav'); ?>
<title>Admin - Drashboard</title>
  <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">Users</div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">pages</i>
                        </div>
                        <div class="content">
                            <div class="text">Pages</div>
                            <div class="number count-to" data-from="0" data-to="<?= count(\App\Models\Pages::pageAll()) ?>" data-speed="1000" data-fresh-interval="20"><?= count(\App\Models\Pages::pageAll()) ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">payment</i>
                        </div>
                        <div class="content">
                            <div class="text">Payments</div>
                            <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">$0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="card">
                    <div class="container">
                        <h1>Welcome Back</h1>
                        <a href="<?=site_base_url()?>admin/generate/sitemap" class='btn btn-primary'>Generate Sitemap</a>
                    </div>
                </div>
            </div>     
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
