<?php

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getMenus($user) {
        if ($user == 'professor') {
            $enviarDados = anchor('upload', 'Fazer Upload', '');
            $logout = anchor('login/logout','Logout');
            return array('menu1' => $enviarDados,'menu2' => $logout);
        }
        if ($user == "administrador") {
            $cadastroProfessor = anchor('professor/cadastro', 'Cadastrar Professor', '');
            $cadastroEscola = anchor('escola/cadastro', 'Cadastrar Escola', '');
            $logout = anchor('login/logout','Logout');
            return array('menu1' => $cadastroProfessor, 'menu2' => $cadastroEscola,'menu3' => $logout);
        }
    }

}
?>