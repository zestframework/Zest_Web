    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="<?= site_base_url() ?>/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/css/style.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/css/themes/all-themes.css" rel="stylesheet" />
    <?= \Zest\View\View::view('admin/nav'); ?>
    <title>Page views -Admin</title>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
         <div class="card">  
           <div class="container"> 
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic dataTable ">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Page</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 <?php 
                    $pages = model('Pages')->pageAll();
                    foreach ($pages as $page => $value) {
                 ?>   
                    <tr>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['type'] ?></td>
                        <td><a href='<?=site_base_url()?>/admin/view/page/<?=$value['id']?>'>More</a></td>
                    </tr>
                   <?php } ?> 
                </tbody>
                </table>
             </div>
            </div>
         </div>
      </div>
    </div>
</section>
    <script src="<?=site_base_url()?>/admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/node-waves/waves.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=site_base_url()?>/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="<?=site_base_url()?>/admin/js/admin.js"></script>
    <script src="<?=site_base_url()?>/admin/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?=site_base_url()?>/js/demo.js"></script>
