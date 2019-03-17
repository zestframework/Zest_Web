<?= \Zest\View\View::view('nav'); ?>
          <script src='<?= site_base_url() ?>/tinymce/tinymce.min.js'></script>
        <script>
tinymce.init({
  selector: 'textarea#desc',
  plugins: 'advlist anchor autolink autoresize autosave code codesample colorpicker image code emoticons fullpage fullscreen help hr imagetools importcss insertdatetime legacyoutput link lists media paste pagebreak preview print save quickbars searchreplace  spellchecker tabfocus template',
  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment | image code',
     convert_urls: false,
     images_upload_url: "<?=site_base_url()?>/uploader/image",
     image_caption: true,
     spellchecker_dialog: true,
     importcss_append: true,
     height: 400,
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', "<?=site_base_url()?>/uploader/image");
      
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
        formData.append('type','community');
        xhr.send(formData);
    },

 });
  </script>
<title>Add Toptic</title>
        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Add Community/Topic</h2>
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
    <section class="section_padding_100">
      <form action='<?=site_base_url()?>/community/add/process' method='post' class="contact-form-area container">
        <div class="row">
          <div class="col-12">
              <input type="text" class="form-control" id="title" name="title" placeholder="Title">
          </div>
          <div class="col-12">
               <select class="form-control" name="cat" id='cat'>
              <option value="general">General</option>
              <option value="support">Support</option>
              <option value="help">Help</option>
              <option value="component development">Component Development</option>
              <option value="issue">Issue</option>
              <option value="request feature">Request Feature</option>
              <option value="request">Request</option>
              <option value="development">Development</option>
              </select>
              </div>
          <div class="col-12">
              <textarea id="desc" name='description' class="materialize-textarea"></textarea>   
          </div>
          <div class="col-12">
             <input type="submit" name="submit" class="zest-btn mt-50 pull-right" value="Create">
          </div>
        </div>
      </div></form>
    </form></section>
<?= \Zest\View\View::view('footer'); ?>
