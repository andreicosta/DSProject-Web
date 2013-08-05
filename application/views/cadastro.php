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
                    <li><?php echo anchor('welcome','Pagina Inicial'); ?></li>
                    <li><?php echo anchor('welcome/cadastro','Cadastro'); ?></li>
                  </ul>
                </div>
              </nav>
            </header>
            <div id="site_content">
              <div id="sidebar_container">
                <div class="sidebar">
                    <form>
                      <h1>Login</h1>
                      <div class="inset">
                      <p>
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf">
                      </p>
                      <p>
                        <label for="senha">SENHA</label>
                        <input type="password" name="senha" id="senha">
                      </p>
                      </div>
                      <p class="p-container">
                        <span>Esqueceu sua senha?</span>
                        <input type="submit" name="go" id="go" value="Entrar">
                      </p>
                    </form>
                </div>
              </div>
              <div class="content"><!-- InstanceBeginEditable name="Content" -->
              	<h1>Sua escola ainda não está cadastrada no PRODOWN?</h1>
                <br>
                <texto>Acesse a pagina de <a href="cadastro_escola.php">cadastramento de escola</a> e preencha o formulário.</texto>
                <h1>O professor ainda não está cadastrado no PRODOWN?</h1>
                <br>
                <texto>Acesse a pagina de <a href="cadastro_professor.php">cadastramento de professor</a> e preencha o formulário.</texto>
			  <!-- InstanceEndEditable --></div>
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
