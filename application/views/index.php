<!doctype html>
<html><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>PRODOWN</title>
        <!-- InstanceEndEditable -->
        <!-- InstanceBeginEditable name="head" -->
        <!-- InstanceEndEditable -->
        <link href="<?php echo base_url(); ?>application/views/css/style.css" rel="stylesheet" type="text/css">
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
                        <form method="POST" action="<?php echo base_url(); ?>welcome/login">
                            <h1>Login</h1>
                            <div class="inset">
                                <p>
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="username" id="cpf">
                                </p>
                                <p>
                                    <label for="senha">SENHA</label>
                                    <input type="password" name="password" id="senha">
                                </p>
                            </div>
                            <p class="p-container">
                                <span>Esqueceu sua senha?</span>
                                <input type="submit" name="go" id="go" value="Entrar">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="content">
                    <h1>Bem Vindo</h1>
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
    <!-- InstanceEnd --></html>
