<?php

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getMenus($user) {
        if ($user == 'professor') {
            $enviarDados = anchor('upload', 'Fazer Upload', '');
            $buscaTodosAluno = anchor('professor/mostrarAll', 'Busca Todos Aluno');
            $buscaGenero = anchor('professor/buscarGenero', 'Busca por Genero');
            $buscaFaixaEtaria = anchor('professor/buscarFaixaEtaria', 'Busca por Faixa Etaria');
            $buscaAluno = anchor('professor/buscarAluno', 'Busca por Aluno ');
            $logout = anchor('login/logout','Logout');
            return array('menu1' => $enviarDados,'menu2' => $buscaTodosAluno,'menu3' => $buscaGenero, 'menu4' => $buscaFaixaEtaria, 'menu5' => $buscaAluno, 'menu6' => $logout );
        }
        if ($user == "administrador") {
            $cadastroProfessor = anchor('professor/cadastro', 'Cadastrar Professor', '');
            $cadastroEscola = anchor('escola/cadastro', 'Cadastrar Escola', '');
            $buscaAvaliacao = anchor('admin/buscarAvaliacao', 'Buscar Avaliacao', '');
            $logout = anchor('login/logout','Logout');
            $buscaProf = anchor('admin/buscarProf' , 'Buscar Professor' , '');
            
            return array('menu1' => $cadastroProfessor, 'menu2' => $cadastroEscola,'menu3' => $buscaAvaliacao,
                    'menu4'=>$logout);
        }
    }

}
?>
