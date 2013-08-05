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
                        <center><h4>Bem Vindo,
                                <?php
                                if (isset($nome)) {
                                    echo $nome;
                                } else {
                                    echo "Erro no Nome";
                                }
                                ?></h4></center>
                    </div>
                </div>
                <div class="content">
                    <center><h1>Welcome to PRODOWN</h1>

                        <h3>Your file was successfully uploaded!</h3>

                        <ul>
                            <?php foreach ($upload_data as $item => $value): ?>
                                <li><?php echo $item; ?>: <?php echo $value; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

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
        <!-- javascript at the bottom for fast page loading -->
        <script type="text/javascript" src="application/views/js/jquery.js"></script>
        <script type="text/javascript" src="application/views/js/jquery.easing-sooper.js"></script>
        <script type="text/javascript" src="application/views/js/jquery.sooperfish.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('ul.sf-menu').sooperfish();
                $('.top').click(function() {
                    $('html, body').animate({scrollTop: 0}, 'fast');
                    return false;
                });
            });
        </script>
    </body>
</html>
