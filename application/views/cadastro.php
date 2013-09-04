<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <meta charset="UTF-8">
        <title>ProDown</title>

        <!-- JQUERY -->
        <script src="<?php echo base_url(); ?>application/views/js/jquery-1.9.1.min.js"></script>



        <!-- TWITTER BOOTSTRAP CSS -->
        <link href="<?php echo base_url(); ?>application/views/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>application/views/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>application/views/css/bootstrapreescrito.css" rel="stylesheet" type="text/css" />

        <!-- TWITTER BOOTSTRAP JS -->
        <script src="<?php echo base_url(); ?>application/views/js/bootstrap.min.js"></script>
        <!--<script src="js/script.js"></script>-->

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
                            <li><?php echo anchor('welcome', 'Início'); ?></li>
                            <li><?php echo anchor('welcome/downloads', 'Downloads'); ?></li>
                            <li><?php echo anchor('welcome/contatos', 'Contatos'); ?></li>
                        </ul>
                        <li><?php echo anchor('welcome/login', 'Login'); ?></li>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked">
                            <li><?php echo anchor('welcome/cadastro', 'Cadastro de Escola'); ?></li>
                            <li><a href="#">Como Aplicar o ProDown</a></li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->
                <div class="container1">
                    <div class="row-fluid1">
                        <form method="POST" action="<?php echo base_url(); ?>escola/solicita">
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Cadastro de Escola</legend>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="nome">Nome</label>
                                    <div class="controls">
                                        <input id="nome" name="nome" type="text" placeholder="Nome da escola" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="cnpj">CNPJ</label>
                                    <div class="controls">
                                        <input id="cnpj" name="cnpj" type="text" placeholder="CNPJ" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="cnpj">Telefone</label>
                                    <div class="controls">
                                        <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="cnpj">Email</label>
                                    <div class="controls">
                                        <input id="email" name="email" type="text" placeholder="Email" class="input-xlarge">
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="control-group">
                                    <label class="control-label" for="estado">Estado</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('estados', $estados, 'RS', 'id="estados" width = "200" class="input-xlarge" '); ?>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="control-group">
                                    <label class="control-label" for="cidade">Cidade</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('cidades', array('1' => ''), 'RS', 'id="cidades" width = "200" class="input-xlarge"'); ?>
                                    </div>
                                </div>


                                <script>
                                    jQuery(function($) {
                                        $("#estados").click(function() {
                                            var e = document.getElementById("estados");
                                            var idEstado = e.selectedIndex + 1;
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
                                                        for (var item in data) {
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

                                <!-- Textarea -->
                                <div class="control-group">
                                    <label class="control-label" for="cpf">CPF dos Professores</label>
                                    <div class="controls">                     
                                        <textarea id="cpf" name="cpf"></textarea>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="botaocadastrar"></label>
                                    <div class="controls">
                                        <button id="botaocadastrar" name="botaocadastrar" class="btn btn-default">Cadastrar</button>
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