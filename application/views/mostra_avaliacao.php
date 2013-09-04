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
              <li><?php echo anchor('admin/buscar', 'Consultas');?></li>
              <li><?php echo anchor('professor/cadastro', 'Cadastro de Professor');?></li>
              <li><?php echo anchor('escola/cadastro', 'Cadastro de Escola');?></li>
              <li><?php echo anchor('professor/remover', 'Remover Professor');?></li>
              <li><?php echo anchor('escola/remover', 'Remover Escola');?></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
            <div class="container1">
               <div class="row-fluid1">
                  <form class="form-horizontal">
                      
                   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                       <script type="text/javascript">

                         // Load the Visualization API and the piechart package.
                         google.load('visualization', '1.0', {'packages':['corechart']});

                         // Set a callback to run when the Google Visualization API is loaded.
                         google.setOnLoadCallback(drawChart_1);

                         // Callback that creates and populates a data table,
                         // instantiates the pie chart, passes in the data and
                         // draws it.
                         function drawChart_1() {  
                           // Create the data table.
                           var data = new google.visualization.arrayToDataTable([
                               ['Classificacao', 'Quantidade']
                               <?php
                                    $f = 0;
                                    $r = 0;
                                    $b = 0;
                                    $mb = 0;
                                    $o = 0;
                                    $other = 0;
                                    
                                    $avaliacoes->data_seek(0);
                                    
                                    while ($row = $avaliacoes->fetch_object()) {
                                        $c = $row->classificacaoSentarEAlcancar;
                                        if ($row->sentarEAlcancarComBanco == 0){
                                            if ($c == 'Fraco'){
                                                $f += 1;
                                            }
                                            elseif ($c == 'Razoavel'){
                                                $r += 1;
                                            }
                                            elseif ($c == 'Bom'){
                                                $b += 1;
                                            }
                                            elseif ($c == 'Muito Bom'){
                                                $mb += 1;
                                            }
                                            elseif ($c == 'Otimo'){
                                                $o += 1;
                                            }
                                            else{
                                                $other += 1;
                                            }
                                        }
                                    }
                                    
                                    echo ",['Fraco',    {$f}]\r\n";
                                    echo ",['Razoavel', {$r}]\r\n";
                                    echo ",['Bom',      {$b}]\r\n";
                                    echo ",['Muito Bom',{$mb}]\r\n";
                                    echo ",['Otimo',    {$o}]\r\n";
                                    echo ",['Nao Fez',    {$other}]\r\n";
                               ?>
                           ]);
                           
                           // Set chart options
                           var options = {'title':'Classificacao Sentar e Alcançar',
                                          'width':500,
                                          'height':350};

                           // Instantiate and draw our chart, passing in some options.
                           var chart = new google.visualization.PieChart(document.getElementById('chart_div_1'));
                           chart.draw(data, options);
                         }
                         
                       </script>
                       <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                       <script type="text/javascript">

                         // Load the Visualization API and the piechart package.
                         google.load('visualization', '1.0', {'packages':['corechart']});

                         // Set a callback to run when the Google Visualization API is loaded.
                         google.setOnLoadCallback(drawChart_2);

                         // Callback that creates and populates a data table,
                         // instantiates the pie chart, passes in the data and
                         // draws it.
                         function drawChart_2() {  
                           // Create the data table.
                           var data = new google.visualization.arrayToDataTable([
                               ['Classificacao', 'Quantidade']
                               <?php
                                    $f = 0;
                                    $r = 0;
                                    $b = 0;
                                    $mb = 0;
                                    $o = 0;
                                    $other = 0;
                                    
                                    $avaliacoes->data_seek(0);
                                    
                                    while ($row = $avaliacoes->fetch_object()) {
                                        $c = $row->classificacaoAbdominal;
                                        if ($c == 'Fraco'){
                                            $f += 1;
                                        }
                                        elseif ($c == 'Razoavel'){
                                            $r += 1;
                                        }
                                        elseif ($c == 'Bom'){
                                            $b += 1;
                                        }
                                        elseif ($c == 'Muito Bom'){
                                            $mb += 1;
                                        }
                                        elseif ($c == 'Otimo'){
                                            $o += 1;
                                        }
                                        else{
                                            $other += 1;
                                        }
                                    }
                                    
                                    echo ",['Fraco',    {$f}]\r\n";
                                    echo ",['Razoavel', {$r}]\r\n";
                                    echo ",['Bom',      {$b}]\r\n";
                                    echo ",['Muito Bom',{$mb}]\r\n";
                                    echo ",['Otimo',    {$o}]\r\n";
                                    echo ",['Nao Fez',    {$other}]\r\n";
                                    //$avaliacoes.close();
                               ?>
                           ]);
                           
                           // Set chart options
                           var options = {'title':'Classificacao Abdominal',
                                          'width':500,
                                          'height':350};

                           // Instantiate and draw our chart, passing in some options.
                           var chart = new google.visualization.PieChart(document.getElementById('chart_div_2'));
                           chart.draw(data, options);
                         }
                       </script>
                       
                       </script>
                       <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                       <script type="text/javascript">

                         // Load the Visualization API and the piechart package.
                         google.load('visualization', '1.0', {'packages':['corechart']});

                         // Set a callback to run when the Google Visualization API is loaded.
                         google.setOnLoadCallback(drawChart_3);

                         // Callback that creates and populates a data table,
                         // instantiates the pie chart, passes in the data and
                         // draws it.
                         
                       function drawChart_3() {  
                           // Create the data table.
                           var data = new google.visualization.arrayToDataTable([
                               ['Classificacao', 'Quantidade']
                               <?php
                                    $f = 0;
                                    $r = 0;
                                    $b = 0;
                                    $mb = 0;
                                    $o = 0;
                                    $other = 0;
                                    
                                    $avaliacoes->data_seek(0);
                                    
                                    while ($row = $avaliacoes->fetch_object()) {
                                        $c = $row->classificacaoArremessoMedicineBall;
                                        if ($c == 'Fraco'){
                                            $f += 1;
                                        }
                                        elseif ($c == 'Razoavel'){
                                            $r += 1;
                                        }
                                        elseif ($c == 'Bom'){
                                            $b += 1;
                                        }
                                        elseif ($c == 'Muito Bom'){
                                            $mb += 1;
                                        }
                                        elseif ($c == 'Otimo'){
                                            $o += 1;
                                        }
                                        else{
                                            $other += 1;
                                        }
                                    }
                                    
                                    echo ",['Fraco',    {$f}]\r\n";
                                    echo ",['Razoavel', {$r}]\r\n";
                                    echo ",['Bom',      {$b}]\r\n";
                                    echo ",['Muito Bom',{$mb}]\r\n";
                                    echo ",['Otimo',    {$o}]\r\n";
                                    echo ",['Nao Fez',    {$other}]\r\n";
                                    //$avaliacoes.close();
                               ?>
                           ]);
                           
                           // Set chart options
                           var options = {'title':'Classificacao Arremesso Medicineball',
                                          'width':500,
                                          'height':350};

                           // Instantiate and draw our chart, passing in some options.
                           var chart = new google.visualization.PieChart(document.getElementById('chart_div_3'));
                           chart.draw(data, options);
                         }
                       </script>
                       
                       </script>
                       <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                       <script type="text/javascript">

                         // Load the Visualization API and the piechart package.
                         google.load('visualization', '1.0', {'packages':['corechart']});

                         // Set a callback to run when the Google Visualization API is loaded.
                         google.setOnLoadCallback(drawChart_4);

                         // Callback that creates and populates a data table,
                         // instantiates the pie chart, passes in the data and
                         // draws it.
                       
                       function drawChart_4() {  
                           // Create the data table.
                           var data = new google.visualization.arrayToDataTable([
                               ['Classificacao', 'Quantidade']
                               <?php
                                    $f = 0;
                                    $r = 0;
                                    $b = 0;
                                    $mb = 0;
                                    $o = 0;
                                    $other = 0;
                                    
                                    $avaliacoes->data_seek(0);
                                    
                                    while ($row = $avaliacoes->fetch_object()) {
                                        $c = $row->classificacaoCorrida20Metros;
                                        if ($c == 'Fraco'){
                                            $f += 1;
                                        }
                                        elseif ($c == 'Razoavel'){
                                            $r += 1;
                                        }
                                        elseif ($c == 'Bom'){
                                            $b += 1;
                                        }
                                        elseif ($c == 'Muito Bom'){
                                            $mb += 1;
                                        }
                                        elseif ($c == 'Otimo'){
                                            $o += 1;
                                        }
                                        else{
                                            $other += 1;
                                        }
                                    }
                                    
                                    echo ",['Fraco',    {$f}]\r\n";
                                    echo ",['Razoavel', {$r}]\r\n";
                                    echo ",['Bom',      {$b}]\r\n";
                                    echo ",['Muito Bom',{$mb}]\r\n";
                                    echo ",['Otimo',    {$o}]\r\n";
                                    echo ",['Nao Fez',    {$other}]\r\n";
                                    //$avaliacoes.close();
                               ?>
                           ]);
                           
                           // Set chart options
                           var options = {'title':'Classificacao Corrida 20 Metros',
                                          'width':500,
                                          'height':350};

                           // Instantiate and draw our chart, passing in some options.
                           var chart = new google.visualization.PieChart(document.getElementById('chart_div_4'));
                           chart.draw(data, options);
                         }
                       </script>
                       </script>
                       <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                       <script type="text/javascript">

                         // Load the Visualization API and the piechart package.
                         google.load('visualization', '1.0', {'packages':['corechart']});

                         // Set a callback to run when the Google Visualization API is loaded.
                         google.setOnLoadCallback(drawChart_5);

                         // Callback that creates and populates a data table,
                         // instantiates the pie chart, passes in the data and
                         // draws it.
                       
                       function drawChart_5() {  
                           // Create the data table.
                           var data = new google.visualization.arrayToDataTable([
                               ['Classificacao', 'Quantidade']
                               <?php
                                    $f = 0;
                                    $r = 0;
                                    $b = 0;
                                    $mb = 0;
                                    $o = 0;
                                    $other = 0;
                                    
                                    $avaliacoes->data_seek(0);
                                    
                                    while ($row = $avaliacoes->fetch_object()) {
                                        $c = $row->classificacaoSaltoHorizontal;
                                        if ($c == 'Fraco'){
                                            $f += 1;
                                        }
                                        elseif ($c == 'Razoavel'){
                                            $r += 1;
                                        }
                                        elseif ($c == 'Bom'){
                                            $b += 1;
                                        }
                                        elseif ($c == 'Muito Bom'){
                                            $mb += 1;
                                        }
                                        elseif ($c == 'Otimo'){
                                            $o += 1;
                                        }
                                        else{
                                            $other += 1;
                                        }
                                    }
                                    
                                    echo ",['Fraco',    {$f}]\r\n";
                                    echo ",['Razoavel', {$r}]\r\n";
                                    echo ",['Bom',      {$b}]\r\n";
                                    echo ",['Muito Bom',{$mb}]\r\n";
                                    echo ",['Otimo',    {$o}]\r\n";
                                    echo ",['Nao Fez',    {$other}]\r\n";
                                    //$avaliacoes.close();
                               ?>
                           ]);
                           
                           // Set chart options
                           var options = {'title':'Classificacao Salto Horizontal',
                                          'width':500,
                                          'height':350};

                           // Instantiate and draw our chart, passing in some options.
                           var chart = new google.visualization.PieChart(document.getElementById('chart_div_5'));
                           chart.draw(data, options);
                         }
                       </script>
                       
                       </script>
                       <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                       <script type="text/javascript">

                         // Load the Visualization API and the piechart package.
                         google.load('visualization', '1.0', {'packages':['corechart']});

                         // Set a callback to run when the Google Visualization API is loaded.
                         google.setOnLoadCallback(drawChart_6);

                         // Callback that creates and populates a data table,
                         // instantiates the pie chart, passes in the data and
                         // draws it.
                       
                       function drawChart_6() {  
                           // Create the data table.
                           var data = new google.visualization.arrayToDataTable([
                               ['Classificacao', 'Quantidade']
                               <?php
                                    $f = 0;
                                    $r = 0;
                                    $b = 0;
                                    $mb = 0;
                                    $o = 0;
                                    $other = 0;
                                    
                                    $avaliacoes->data_seek(0);
                                    
                                    while ($row = $avaliacoes->fetch_object()) {
                                        $c = $row->classificacaoTesteDoQuadrado;
                                        if ($c == 'Fraco'){
                                            $f += 1;
                                        }
                                        elseif ($c == 'Razoavel'){
                                            $r += 1;
                                        }
                                        elseif ($c == 'Bom'){
                                            $b += 1;
                                        }
                                        elseif ($c == 'Muito Bom'){
                                            $mb += 1;
                                        }
                                        elseif ($c == 'Otimo'){
                                            $o += 1;
                                        }
                                        else{
                                            $other += 1;
                                        }
                                    }
                                    
                                    echo ",['Fraco',    {$f}]\r\n";
                                    echo ",['Razoavel', {$r}]\r\n";
                                    echo ",['Bom',      {$b}]\r\n";
                                    echo ",['Muito Bom',{$mb}]\r\n";
                                    echo ",['Otimo',    {$o}]\r\n";
                                    echo ",['Nao Fez',    {$other}]\r\n";
                                    //$avaliacoes.close();
                               ?>
                           ]);
                           
                           // Set chart options
                           var options = {'title':'Classificacao Teste Do Quadrado',
                                          'width':500,
                                          'height':350};

                           // Instantiate and draw our chart, passing in some options.
                           var chart = new google.visualization.PieChart(document.getElementById('chart_div_6'));
                           chart.draw(data, options);
                         }
                       </script>
                       
                       <center>
                       <div>
                       <div class="span6" id="chart_div_1"></div>
                       <div class="span6" id="chart_div_2"></div>
                       </div>
                       <div>
                       <div class="span6" id="chart_div_3"></div>
                       <div class="span6" id="chart_div_4"></div>
                       </div>
                       <div>
                       <div class="span6" id="chart_div_5"></div>
                       <div class="span6" id="chart_div_6"></div>
                       </div>
                       </center>
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
