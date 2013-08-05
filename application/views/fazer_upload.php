<!DOCTYPE HTML>
<html>

    <head>
        <title>PRODOWN</title>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
                    <li><?php echo anchor('welcome','Pagina Inicial'); ?></li>
                    <li><?php echo anchor('welcome/cadastro','Cadastro'); ?></li>
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
                    <center><h1>Fazer upload de avaliações</h1><br>

                    <?php echo form_open_multipart('upload/do_upload'); ?>

                    <input type="file" name="userfile"/>

                    <br /><br />

                    <input type="submit" value="upload" />
                    
                    <?php form_close();
                    if(isset($error)){
                        echo $error;
                    }
                    
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
