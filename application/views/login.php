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
            <div class="container1">
               <div class="row-fluid1">
                   <form method="POST" action="<?php echo base_url();?>welcome/fazer_login">
                     <fieldset>
                     
                     <!-- Form Name -->
                     <legend>Login</legend>
                     
                     <!-- Text input-->
                     <div class="control-group">
                       <label class="control-label" for="nome">CPF</label>
                       <div class="controls">
                         <input id="cpflogin" name="username" type="text" placeholder="Digite seu CPF" class="input-xlarge">
                         
                       </div>
                     </div>
                     
                     <!-- Password input-->
                     <div class="control-group">
                       <label class="control-label" for="senha">Senha</label>
                       <div class="controls">
                         <input id="senha" name="password" type="password" placeholder="Digite sua senha" class="input-xlarge">
                         
                       </div>
                     </div>
                     
                     <!-- Button -->
                     <div class="control-group">
                       <label class="control-label" for="botaoentrar"></label>
                       <div class="controls">
                         <input type="submit" id="botaoentrar" name="botaoentrar" class="btn" value="Entrar"/>
                       </div>
                     </div>
                     
                     </fieldset>
                  </form>
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
