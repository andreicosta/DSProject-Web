<!DOCTYPE HTML>
<html>
    <head>
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>latinise_min.js"></script>

        <title>PRODOWN</title>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/css/style.css" />
    </head>

    <body>
        <div id="main">
            <header>
                <div id="logo">

                </div>
                <nav>
                    <div id="menu_container">
                        <ul class="sf-menu" id="nav">
                            <li><?php echo anchor('welcome', 'Pagina Inicial'); ?></li>
                            <li><?php echo anchor('welcome/cadastro', 'Cadastro'); ?></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div id="site_content">
                <div id="sidebar_container">
                    <div class="sidebar">
                        <br>
                        <br>
                        <center><h4>Bem Vindo, <?php echo $nome; ?></h4></center>
                        <?php foreach ($menus as $menu): ?>
                            <li><?php echo $menu; ?></li>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="content">
                    <center>
                        <h1>Busca por Genero</h1>
                       <?php 
                        echo form_open('professor/mostrarGenero');
                        echo form_dropdown('estados', $escola, '1', 'id="estados" width = "200" style="width: 200px"');
                        echo '<br><br>';
                        echo form_radio('gender', '1', TRUE); echo form_label('Male', 'gender');
                        echo form_radio('gender', '2', FALSE); echo form_label('Feale', 'gender');
                        echo form_submit('cadastrar', 'Buscar Avalicao');
                        echo form_close();
                       ?>
                    </center>
                </div>
            </div>
            <div id="scroll">
                <a title="Scroll to the top" class="top" href="#"><img src="<?php echo base_url(); ?>application/views/images/top.png" alt="top" /></a>
            </div>
            <footer>
                <p>Copyright &copy; CSS3_grass | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
            </footer>
        </div>
    </body>
</html>

