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
    <?=view('admin/nav'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <title>Send Emails -Admin</title>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="container">
                    <br>
                     <div class="card">
                         <div class="container">
                             <h1>Mail</h1>
                             <form action="<?= site_base_url() ?>/admin/send/mail" method="post" enctype="multipart/form-data">
                                <div class="col-md-8">
                                    <b>Subject</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='sub' >
                                    </div>
                                </div>
                                </div>       
                                <div class="col-md-8">
                                    <b>Msg</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='msg' >
                                    </div>
                                </div>
                                </div>          
                                
                                <div class="col-md-8">
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit"> 
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
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>