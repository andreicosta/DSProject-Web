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
                  <h2>PRODOWN</h1>
                  <p><h4>Programa de Avaliação da Aptidão Física de Crianças e Jovens com Síndrome de Down – 
                         Normas de Avaliação da Aptidão Física</h3></p>
                  <p align="justify">Este programa sugere tabelas normativas no que se refere ao desenvolvimento de crianças e jovens brasileiros 
                     com Síndrome de Down (SD), sendo parte do PROESP-BR na utilização de um sistema informatizado, 
                     que oferecerá todo o suporte de informações aos usuários do programa.</p>
                  <p align="justify">A atuação do PRODOWN configura-se em delinear o perfil das crianças e jovens brasileiras com SD, no crescimento e 
                     desenvolvimento somatomotor e aptidão física relacionada à saúde e ao desempenho motor. Permite ainda, organizar um banco 
                     de dados da população brasileira com SD, que ofereça a possibilidade de desenvolver estudos epidemiológicos, referentes 
                     ao estilo de vida, das relações entre a atividade física, exercício físico e doenças associadas, bem como o perfil da 
                     aptidão física.</p>
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