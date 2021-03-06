<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title>Add Component</title>

        <!-- ***** Breadcumb Area Start ***** -->
    <div class="zest-breadcumb-area" style="background-image: url(<?=site_base_url()?>/prenium/img/cover-small.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Add Component Project</h2>
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
      <form action='<?=site_base_url()?>/components/add/process' method='post' class="contact-form-area container">
        <div class="row">
          <div class="col-12">
              <input type="text" class="form-control" id="title" name="title" placeholder="Title">
          </div>
          <div class="col-12">
               <select class="form-control" name="cat" id='cat'>
              <option value="general">General</option>
              <option value="site_admin">Site Admin</option>
              <option value="seo">SEO</option>
              <option value="feature">Feature</option>
              <option value="other">Other</option>
              </select>
              </div>

          <div class="col-12">
              <textarea id="description" name='description' class="materialize-textarea"></textarea>   
          </div>
          <div class="col-12">
             <input type="submit" name="submit" class="zest-btn mt-50 pull-right" value="Create">
          </div>
        </div>
      </div>
      </section>   
<?= \Zest\View\View::view('footer'); ?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>