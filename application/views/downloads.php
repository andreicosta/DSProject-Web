<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>ProDown</title>
 
        
        <!-- JQUERY -->
         <script src="<?php echo base_url();?>application/views/js/jquery-1.9.1.min.js"></script>
         
         
         
        <!-- TWITTER BOOTSTRAP CSS -->
        <link href="<?php echo base_url();?>application/views/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>application/views/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>application/views/css/bootstrapreescrito.css" rel="stylesheet" type="text/css" />
 
        <!-- TWITTER BOOTSTRAP JS -->
        <script src="<?php echo base_url();?>application/views/js/bootstrap.min.js"></script>
 
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="brand">ProDown</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><?php echo anchor('welcome', 'Início');?></li>
              <li><?php echo anchor('welcome/downloads', 'Downloads');?></li>
              <li><?php echo anchor('welcome/contatos', 'Contatos');?></li>
            </ul>
            <li><?php echo anchor('welcome/login', '<div class="btn">Login</div>');?></li>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

   <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-tabs nav-stacked">
              <li><?php echo anchor('welcome/cadastro', 'Cadastro de Escola');?></li>
              <li><a href="#">Como Aplicar o ProDown</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
            <div class="container1" align="center">
               <div class="row-fluid">
                  <div class="span4" >
                      <a href="#"><img src="<?php echo base_url("application/views/img/linux-logo1.png");?>" alt="linux" width="200" height="600" align="middle"/>
                     <p><h2>Linux</h2></p></a>
                  </div>
                  <div class="span4">
                     <a href="#"><img src="<?php echo base_url("application/views/img/apple_ipad_logo1.png");?>" alt="apple" width="200" height="600" align="middle"/>
                     <p><h2>Mac OS</h2></p></a>
                  </div>
                  <div class="span4">
                     <a href="#"><img src="<?php echo base_url("application/views/img/Windows-logo11.png");?>" alt="windows" width="200" height="600" align="middle" />
                     <p align="center"><h2>Windows</h2></p></a>
                  </div>
         </div> <!-- /container1 -->
      </div><!--/row-->

      <hr>

      <footer>
        <p align="center">&copy; ProDown 2013</p>
      </footer>

    </div><!--/.fluid-container-->
    
    
    </body>
</html>
