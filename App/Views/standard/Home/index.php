<?= \Zest\View\View::view('nav'); ?>
<meta name="author" content="Malik umer Farooq">
<neta name="description" content="<?= $args[3]['value'] ?>"/>
<neta name="keyword" content="<?= $args[4]['value'] ?>"/>
<title>Zest Framework</title>
<body>
  <div id='profile-plater'>
    <h3>PHP Zest Framework</h3>
    <p>Zest is a simple yet powerful PHP MVC framework for rapid application development that is suited for small to medium scale apps and APIs.</p>
  </div>  
  <div id='relax'></div>
  <div id='white-board'>
    <h4>How we are different from others</h4>
          <table class="responsive-table">
        <thead>
          <tr>
              <th></th>
              <th>Zest</th>
              <th>Others</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Very Light in weight (core filesize less then 1MB)</td>
            <td><i class="material-icons prefix">check</i></td>
            <td><i class="material-icons prefix" style='color:red!important'>close</i></td>
          </tr>
          <tr>
            <td>Without external dependencies (expect core and autoload)</td>
            <td><i class="material-icons prefix">check</i></td>
            <td><i class="material-icons prefix" style='color:red!important'>close</i></td>
          </tr>
          <tr>
            <td>Support Components</td>
            <td><i class="material-icons prefix">check</i></td>
            <td><i class="material-icons prefix" style='color:red!important'>close</i></td>     
          </tr>             

        </tbody>
      </table>
   </div>   
   <div id='relax'></div>
   <div id='white-board'>
    <h4>Features</h4>
      <table class="responsive-table">
        <thead>
          <tr>
              <th>Features</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Advance Routing system.</td>
          </tr>     
          <tr>
            <td>Router Caching Support.</td>
          </tr>  
          <tr>
            <td>Dependency Injection.</td>
          </tr>  
          <tr>
            <td>Validation.</td>
          </tr>     
          <tr>
            <td>Cryptography.</td>
          </tr>  
          <tr>
            <td>Security: csrf,xss,Database injection protections.</td>
          </tr>                                         
           <tr>
            <td>And Much More.</td>
          </tr>                        
        </tbody>
      </table>
   </div>   
   <div id='relax'></div>
   <div id='white-board'>
    <h4 id='#comparision'>Comparison</h4>
      <table class="responsive-table">
        <thead>
          <tr>
              <th></th>
              <th>Zest</th>
              <th>Laravel</th>
              <th>Slim</th>
              <th>codeigniter</th>
              <th>Symfony</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>Router Caching.</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>No</td>
            <td>Yes</td>
          </tr>     
          <tr>
            <th>Cache storage.</th>
            <td>File system, Memcache , APC, Opcache</td>
            <td>File System, Database, Memcached, APC, Redis, Xcache, WinCache, Memory (Arrays) </td>
            <td>No</td>
            <td>File, apc, memcached, xcache  </td>
            <td>Yes</td>
          <tr>
          <tr>
            <th>Validator.</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>No</td>
            <td>Yes</td>
            <td>Yes</td>
          <tr>            
            <th>Dependency injection container.</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>No</td>
            <td>Yes</td>
          </tr>  
          <tr>
            <th>Template System.</th>
            <td>Zest , PHP custom</td>
            <td>Blade, PHP, Custom</td>
            <td>Twig</td>
            <td>PHP, Simple template parser "{var_name}"</td>
            <td>Twig</td>
          </tr>     
          <tr>
            <th>Testing library.</th>
            <td>No</td>
            <td>PHPUnit</td>
            <td>No</td>
            <td>PHPUnit (In development)</td>
            <td>Yes</td>
          </tr>  
          <tr>
            <th>Logging management.</th>
            <td>Yes (psr-3 without interface)</td>
            <td>yes</td>
            <td>Yes</td>
            <td>No</td>
            <td>Yes</td>
          </tr>   
          <tr>
            <th>Auth.</th>
            <td>Yes</td>
            <td>yes</td>
            <td>No</td>
            <td>No</td>
            <td>Yes</td>
          </tr>                                                 
           <tr>
            <th>Core file size including depencies.</th>
            <td>691 KB</td>
            <td>7.69 MB++</td>
            <td>636 KB</td>
            <td>1.80 MB</td>
            <td>17.1 MB++</td>
          </tr>  
           <tr>
            <th>MVC.</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>            
          </tr>  
           <tr>
            <th>PHP7.</th>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>
            <td>Yes</td>            
          </tr>                             
            <th>License.</th>
            <td>MIT</td>
            <td>MIT</td>
            <td>MIT</td>
            <td>Apache</td>
            <td>MIT</td>                             
        </tbody>
      </table>
   </div>
</body> 
<?= \Zest\View\View::view('footer'); ?>



