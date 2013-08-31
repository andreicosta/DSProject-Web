<!doctype html>
<html><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>latinise_min.js"></script>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>PRODOWN</title>
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

                <div class="content">
                    <center>
                        <h1>Solicitação de Cadastro Escola</h1>
                        <?php
                        echo form_open('escola/solicita');
                        if(isset($validation)){
                            echo $validation;
                        }
                        echo form_label('Nome da Escola');
                        //$temp = ;
                        echo form_input(array('name' => 'nome'), set_value('nome'), 'autofocus');
                        echo form_label('CNPJ');
                        echo form_input(array('name' => 'cnpj'), '', '');
                        echo form_label('Telefone');
                        echo form_input(array('name' => 'telefone'), '', '');
                        echo form_label('Email');
                        echo form_input(array('name' => 'email'), '', '');

                        echo form_dropdown('estados', $estados, 'RS', 'id="estados" width = "200" style="width: 200px"');
                        echo '<br><br>';
                        echo form_dropdown('cidades', array('1' => ''), 'RS', 'id="cidades" width = "200" style="width: 200px"');
                        echo '<br><br>';
                        echo form_submit('cadastrar','Enviar Solicitação');
                        echo form_close();
                        ?>
                        <script>
                            jQuery(function($) {
                                $("#estados").click(function() {
                                    var e = document.getElementById("estados");
                                    var idEstado = e.selectedIndex +1;
                                    var select = $("select[name=cidades]")[0];
                                    if (idEstado !== 0) {
                                        var base_url = <?php echo '"' . base_url() . '"'; ?>;

                                        $.ajax({
                                            //data: {estado: NormalizeString(encode_utf8(strUser))},
                                            data: {estado: idEstado},
                                            url: base_url + 'estado/getCidades',
                                            method: 'GET',
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(data) {
                                                for (var i = 0; i < select.options.length; i++) {
                                                    select.options[i] = null;
                                                }
                                                var i = 0;
                                                for(var item in data){
                                                    select.options[i] = new Option(data[item], item);
                                                    i++;
                                                }
                                            },
                                            error: function(error) {
                                                alert("error");
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
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
<!-- InstanceEnd --></html>
