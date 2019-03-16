    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <script src="<?= site_base_url(); ?>/tinymce/tinymce.min.js" ></script>
    <link href="<?= site_base_url() ?>/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= site_base_url() ?>/admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?= site_base_url() ?>/admin//plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
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
    <title>Edit this page -Admin</title>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
             <div class="card">
                <div class="container">
                    <h1>Edit page type:</h1>
                    <form action="<?= site_base_url() ?>/admin/view/page/<?= $args['id'] ?>" method="post">
                        <input type="text" name="id" value="<?=$args['id']?>" hidden>
                        <div class="col-md-12">
                        <p>
                            <b>Role (current => <?=$args['type']?>)</b>
                        </p>
                        <select class="form-control show-tick" name='type'>
                            <option value='blog' disabled>Plese Choose one type</option>
                            <option value="blog">Blogs</option>
                            <option value="faq">FAQ's</option>
                            <option value='news'>News</option>
                        </select>
                        </div>   
                        <br><br><br><br>
                        <input type="submit" name="ty" class="btn btn-primary" value="Change Type">                     

                     </form>                     
                </div>                  
             </div> 
             <div class="card">
                <div class="container">
                    <h1>Preview Image</h1>
                    <img style='width:50%' src="<?=site_base_url()?>/read/image/<?=$args['image']?>" class="image-responsive">
                    <h1>Add Image:</h1>
                    <form action="<?= site_base_url() ?>/admin/view/page/<?= $args['id'] ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?=$args['id']?>" hidden>
                        <div class="col-md-12">
                            <b>Image</b>
                           <input type="file" id="file" class="form-control" name='image' > 
                        </div>   
                        <br><br><br><br>
                        <input type="submit" name="img" class="btn btn-primary" value="Add">
                     </form>                     
                </div>                  
             </div> 
             <div class="card">
                <div class="container">
                    <h1>Edit page :</h1>
                    <form action="<?= site_base_url() ?>/admin/view/page/<?= $args['id'] ?>" method="post">
                        <input type="text" name="id" value="<?=$args['id']?>" hidden>
                        <div class="col-md-12ss">
                        <p>
                            <b>Title</b>
                        </p>
                        <input type="text" name="title" class="form-control" value="<?= $args['title'] ?>" />
                        </div> 
                                 <div class="col-md-8ss">
                                    <b>Keywords (seperate by comma)</b>
                                <div class="">
                                    <div class="">
                                        <input type="text" id="" class="form-control" name='keyword' value="<?= restore_line_break($args['keyword']) ?>">
                                    </div>
                                </div>
                                </div>                             
                        <div class="col-md-12">
                        <p>
                            <b>Short content</b>
                        </p>
                        <input type="text" name="scontent" class="form-control" value="<?= restore_line_break($args['scontent']) ?>" />
                        </div>  
                        <div class="col-md-12ss">
                        <p><b> content</b></p>
                             <textarea id="desc" name='contents'><?= $args['content'] ?></textarea>
                        </div>
                        <br><br>
                        <input type="submit" name="edit" class="btn btn-primary" value="Edit">                     
                     </form>                     
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
    <script src="<?= site_base_url() ?>/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?= site_base_url() ?>/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= site_base_url() ?>/admin//js/admin.js"></script>
    <script src="<?= site_base_url() ?>/admin/js/pages/forms/basic-form-elements.js"></script>
