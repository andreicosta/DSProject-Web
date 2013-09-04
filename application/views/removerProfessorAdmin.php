<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <meta charset="UTF-8">
        
        <title>ProDown</title>

        <!-- JQUERY -->
        



        <!-- TWITTER BOOTSTRAP CSS -->
        <link href="<?php echo base_url(); ?>application/views/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>application/views/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>application/views/css/bootstrapreescrito.css" rel="stylesheet" type="text/css" />

        <!-- TWITTER BOOTSTRAP JS -->
        <script src="<?php echo base_url(); ?>application/views/js/bootstrap.min.js"></script>

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
                        <li><?php echo anchor('login/logout', 'Logout'); ?></li>
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
                            <li><?php echo anchor('admin/consulta', 'Consultas'); ?></li>
                            <li><?php echo anchor('professor/cadastro', 'Cadastro de Professor'); ?></li>
                            <li><?php echo anchor('escola/cadastro', 'Cadastro de Escola'); ?></li>
                            <li><?php echo anchor('professor/remover', 'Remover Professor'); ?></li>
                            <li><?php echo anchor('escola/remover', 'Remover Escola'); ?></li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->
                <div class="container1">
                    <div class="row-fluid1">
                        <form method="POST" action="<?php echo base_url(); ?>professor/remove">
                            <fieldset>

                                <!-- Form Name -->
                                <legend>Remover Professor</legend>

                                <!-- Select Basic -->
                                <div class="control-group">
                                    <label class="control-label" for="selecionaEscola">Escola</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('escolas', $escolas, '', 'id="estados" class="input-xlarge"') ?>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="control-group">
                                <div class="control-group">
                                    <label class="control-label" for="cidade">Professores</label>
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
                                            var x = $("#estados").val();
                                            if (idEstado !== 0) {
                                                var base_url = <?php echo '"' . base_url() . '"'; ?>;

                                                $.ajax({
                                                    data: {estado: x},
                                                    url: base_url + 'professor/getProfessoresEscola',
                                                    method: 'GET',
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success: function(data) {
                                                        for (var i = 0; i < select.options.length+1; i++) {
                                                            select.options[i] = null;
                                                        }
                                                        var i = 0;
                                                        for (var item in data) {
                                                            select.options[i] = new Option(data[item], item);
                                                            i++;
                                                        }
                                                    },
                                                    error: function(error) {
                                                        alert(x);
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="removerButton"></label>
                                    <div class="controls">
                                        <button type="Submit" id="removerButton" name="removerButton" class="btn btn-default" value="RemoverProfessor">Remover</button>
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
