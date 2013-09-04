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
            <li><?php echo anchor('login/logout', '<div class="btn">Logout</div>');?></li>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

   <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="bemvindo"><h4>Bem vindo, Admin</h4></div>
          <div class="well sidebar-nav">
            <ul class="nav nav-tabs nav-stacked">
              <li><?php echo anchor('admin/consulta', 'Consultas');?></li>
              <li><?php echo anchor('professor/cadastro', 'Cadastro de Professor');?></li>
              <li><?php echo anchor('escola/cadastro', 'Cadastro de Escola');?></li>
              <li><?php echo anchor('professor/remover', 'Remover Professor');?></li>
              <li><?php echo anchor('escola/remover', 'Remover Escola');?></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
            <div class="container1">
               <div class="row-fluid1">
                   <form method="POST" action="<?php echo base_url();?>professor/add">
                     <fieldset>
                     
                     <!-- Form Name -->
                     <legend>Cadastro de Professor</legend>
                     
                     <!-- Text input-->
                     <div class="control-group">
                       <label class="control-label" for="nomeProfessor">Nome</label>
                       <div class="controls">
                         <input id="nomeProfessor" name="nome" type="text" placeholder="Nome do Professor" class="input-xlarge">
                         
                       </div>
                     </div>
                     
                     <!-- Text input-->
                     <div class="control-group">
                       <label class="control-label" for="cpfProfessor">CPF</label>
                       <div class="controls">
                         <input id="cpfProfessor" name="cpf" type="text" placeholder="CPF" class="input-xlarge">
                         
                       </div>
                     </div>
                     
                     <!-- Text input-->
                     <div class="control-group">
                       <label class="control-label" for="emailProfessor">E-mail</label>
                       <div class="controls">
                         <input id="emailProfessor" name="email" type="text" placeholder="e-mail" class="input-xlarge">
                         
                       </div>
                     </div>
                     
                     <div class="control-group">
                         <label class="control-label" for="Escola">Escolas</label>
                          <div class="controls" margin:0 0 0 105px;">
                            <select id="escolaSelect" name="escola" class="input-xlarge">
                                <?php foreach ($escolas as $escola): ?>
                                    <option><?php echo $escola; ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                     
                     <!-- Button -->
                     <div class="control-group">
                       <label class="control-label" for="botaocadastrar"></label>
                       <div class="controls">
                         <button id="botaocadastrar1" name="botaocadastrar" class="btn btn-default">Cadastrar</button>
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