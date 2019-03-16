    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <script src="<?= site_base_url(); ?>/tinymce/tinymce.min.js" ></script>
    <link href="<?= site_base_url() ?>/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>admin//plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/css/style.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/css/themes/all-themes.css" rel="stylesheet" />
          <script src='<?= site_base_url() ?>/tinymce/tinymce.min.js'></script>
        <script>
tinymce.init({
  selector: 'textarea#desc',
  plugins: 'advlist anchor autolink autoresize autosave code codesample colorpicker image code emoticons fullpage fullscreen help hr imagetools importcss insertdatetime legacyoutput link lists media paste pagebreak preview print save quickbars searchreplace  spellchecker tabfocus template',
  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment | image code',
     convert_urls: false,
     images_upload_url: "<?=site_base_url()?>/admin/uploader/image",
     image_caption: true,
     spellchecker_dialog: true,
     importcss_append: true,
     height: 400,
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', "<?=site_base_url()?>/admin/uploader/image");
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },

 });
  </script>
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
                             <form action="<?= site_base_url() ?>/admin/page/add" method="post" enctype="multipart/form-data">
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
                                    <option value="news">News</option>
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
                                    <b>Image</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="file" id="file" class="form-control" name='image' >
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

