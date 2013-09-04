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
          <div class="bemvindo"><h4>Bem vindo, Professor</h4></div>
          <div class="well sidebar-nav">
            <ul class="nav nav-tabs nav-stacked">
              <li><?php echo anchor('upload', 'Fazer Upload');?></li>
              <li><?php echo anchor('professor/buscar', 'Consultas');?></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
            <div class="container1">
               <div class="row-fluid1">
                  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>professor/mostrar">
                        <fieldset>
                        
                        <!-- Form Name -->
                        <legend>Consultas</legend>
                        
                        <!-- Multiple Checkboxes -->
                        <div class="control-group">
                          <label class="control-label" for="checkGenero"></label>
                          <div class="controls" style="float:left; margin-left:20px;">
                           <label class="checkbox" for="checkGenero">
                              <input type="checkbox" name="checkGenero" id="checkGenero" value="Gênero">
                              Gênero
                           </label>
                          </div>
                          <div class="controls" style="float:left; margin:0 0 0 100px;">
                            <label class="radio inline" for="mascFemRadios-0" style="margin-right: 50px;">
                              <input type="radio" name="Masculino" id="mascFemRadios-0" value="Masculino">
                              Masculino
                            </label>
                            <label class="radio inline" for="mascFemRadios-1">
                              <input type="radio" name="Feminino" id="mascFemRadios-1" value="Feminino">
                              Feminino
                            </label>
                          </div>
                        </div>
                        
                        
                        <!-- Multiple Checkboxes -->
                        <div class="control-group">
                          <label class="control-label" for="faixaEtariaCheck"></label>
                          <div class="controls" style="float:left; margin-left:20px;">
                            <label class="checkbox" for="faixaEtariaCheck-0">
                              <input type="checkbox" name="checkFaixa" id="faixaEtariaCheck-0" value="Faixa Etária">
                              Faixa Etária
                            </label>
                          </div>
                          <div class="controls" style="float:left; margin:0 0 0 30px;">
                               <label class="control-label" for="deSelect" style="margin-right:-10px; margin-top: -5px;">De:
                            <select id="deSelect" name="faixa1" class="input-xlarge">
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                              <option>13</option>
                              <option>14</option>
                              <option>15</option>
                              <option>16</option>
                              <option>17</option>
                              <option>18</option>
                              <option>19</option>
                              <option>20</option>                              
                            </select>
                            </label>
                            <label class="control-label" for="ateSelect" style="margin-top: -5px;">Até:
                            <select id="ateSelect" name="faixa2" class="input-xlarge">
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                              <option>13</option>
                              <option>14</option>
                              <option>15</option>
                              <option>16</option>
                              <option>17</option>
                              <option>18</option>
                              <option>19</option>
                              <option>20</option>   
                            </select>
                            </label>
                          </div>
                        </div>
                         
                        <!-- Multiple Checkboxes -->
                        <div class="control-group">
                          <label class="control-label" for="escolaCheck"></label>
                          <div class="controls" style="float:left; margin-left:20px;">
                            <label class="checkbox" for="escolaCheck-0">
                              <input type="checkbox" name="checkEscola" id="escolaCheck-0" value="Escola">
                              Escola
                            </label>
                          </div>
                          <div class="controls" style="float:left; margin:0 0 0 105px;">
                            <select id="escolaSelect" name="escola" class="input-xlarge">
                                <?php foreach ($escolas as $escola): ?>
                                    <option><?php echo $escola; ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Multiple Checkboxes -->
                        <div class="control-group">
                          <label class="control-label" for="alunoCheck"></label>
                          <div class="controls" style="float:left; margin-left:20px;">
                            <label class="checkbox" for="alunoCheck-0">
                              <input type="checkbox" name="checkAluno" id="alunoCheck-0" value="Aluno">
                              Aluno
                            </label>
                          </div>
                          <div class="controls" style="float:left; margin:0 0 0 110px;">
                            <select id="alunoSelect" name="aluno" class="input-xlarge">
                               <?php foreach ($alunos as $aluno): ?>
                                    <option><?php echo $aluno; ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Button -->
                        <div class="control-group">
                          <label class="control-label" for="consultasButton"></label>
                          <div class="controls">
                            <input type="submit" id="consultasButton" name="consultasButton" class="btn" value="Consultar" />
                          </div>
                        </div>
                        
                        </fieldset>
                     </form>

                     
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
