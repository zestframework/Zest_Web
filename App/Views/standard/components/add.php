<?= \Zest\View\View::view('nav'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<title>Add Component</title>
<section class="about-banner">
<div class="container">       
  <div class="row d-flex align-items-center justify-content-center">
    <div class="about-content col-lg-12">
      <h1 class="text-white">
        Add Component        
      </h1> 
      <p class="text-white link-nav"><a href="<?=site_base_url()?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#!"> Add Component</a></p>
    </div>  
  </div>
</div>
</section>
<div class='sample-text-area'>
  <div class="container">
     <form action='<?=site_base_url()?>/components/add/process' method='post' class="">
        <div class="mt-10">
          <input type="text" name="title" id='title' placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input">
        </div>
        <div class="mt-20">
          <textarea id="description" name='description' class="materialize-textarea"></textarea>        
        </div> 
          <div class="button-group-area mt-40 text-right">
            <input type="submit" name="submit" class="genric-btn primary radius" value="Submit">
          </div> 
       </form>                 
    </div>    
</div>
<?= \Zest\View\View::view('footer'); ?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>