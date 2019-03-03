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
    <title>Announcement -Admin</title>
    <?php $args = $args['arg']?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card">
                <div class="container">
                    <br>
                     <div class="card">
                         <div class="container">
                             <h1>Announcement</h1>
                             <form action="<?= site_base_url() ?>/admin/announcement" method="post">
                                <div class="col-md-12">
                                    <b>title</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" id="title-text" class="form-control" name='title' value="<?=$args['title']?>">
                                    </div>
                                </div>
                                </div>                   
                                <div class="col-md-12">
                                    <b>Email</b>
                                <div class="input-group">
                                    <div class="form-line">
                                    	<label>Current:  <?=$args['type']?></label>
                                        <select class="form-control" name='type'>
                                        	<option value="success">Success</option>
                                        	<option value="error">Error</option>
                                        	<option value="information">Info</option>
                                        	<option value="warning">Warning</option>
                                        	<option value="primary">Primary</option>
                                        	<option value="secondary">secondary</option>
                                        	<option value="dark">Dark</option>
                                        	<option value="light">Light</option>
                                        </select>
                                    </div>
                                </div>
                                </div>                    
                                <div class="col-md-12">
                                    <b>Description</b>
                                <div class="input-group">
                                    <div class="form-line">
                                    	<textarea class="form-control" name='detail'><?=$args['detail']?></textarea>
                                    </div>
                                </div>
                                </div>   
                                <?php if (empty($args)) { ?>
                                	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                <?php }else { ?>
                                	<input type="submit" name="update" class="btn btn-primary" value="Update">
                                <?php } ?>	 
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
