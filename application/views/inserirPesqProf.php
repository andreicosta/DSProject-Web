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
                        <h1>Procura Professor </h1>
                        <?php
                        echo form_open('admin/procuraprof');
                        echo form_label('CPF');
                        echo form_input(array('cpf'=>'cpf'),'','autofocus');
                        
                        echo form_submit('cadastrar','Cadastrar Professor');
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
                                                /*for (var i = 0; i < data.length; i++) {
                                                    select.options[i] = new Option(data[i], (i+1));
                                                }*/
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
                            jQuery(function($) {
                                $("#cidades").click(function() {
                                    var e = document.getElementById("estados");
                                    var idEstado = e.selectedIndex +1;
                                    var e1 = document.getElementById("cidades");
                                    var idCidade = e1.selectedIndex +1;
                                    var select = $("select[name=escolas]")[0];
                                    if (idEstado !== 0) {
                                        var base_url = <?php echo '"' . base_url() . '"'; ?>;

                                        $.ajax({
                                            //data: {estado: NormalizeString(encode_utf8(strUser))},
                                            data: {estado: idEstado,cidade:idCidade},
                                            url: base_url + 'estado/getEscolas',
                                            method: 'GET',
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(data) {
                                                for (var i = 0; i < select.options.length; i++) {
                                                    select.options[i] = null;
                                                }
                                                /*for (var i = 0; i < data.length; i++) {
                                                    select.options[i] = new Option(data[i], data[i]);
                                                }*/
                                                var i = 0;
                                                for(var item in data){
                                                    select.options[i++] = new Option(data[item], item);
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
</html>

