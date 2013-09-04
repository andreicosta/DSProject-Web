<?php

class Professor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once 'application/controllers/menu.php';
        require_once 'application/controllers/estado.php';
    }

    public function cadastro() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];

        $CI = $this->get_instance();
        $CI->load->model('admin_model');
        $escolas = $CI->admin_model->getEscolas($user);
        $estado = new Estado();
        
        $data = array('nome' => $nome, 'estados' => $estado->getEstados(), 'escolas' => $escolas);
        $this->load->view('cadastro_professor', $data);
    }
    
    public function add() {
        if (isset($_POST['nome'])) {
            $data = array();
            $data['nome'] = $_POST['nome'];
            $data['cpf'] = $_POST['cpf'];
            $data['email'] = $_POST['email'];
            $data['escola'] = $_POST['escola'];
            
            $this->load->model('Professor_model');
            $result = $this->Professor_model->doAddProfessor($data);
            
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];

            $data2 = array('nome' => $nome);

            if (isset($result['error'])) {
                $data2['result'] = $result['error'];
            }else{
                $data2['result'] = $result['success'];
                $t = "Sua senha é: ".$result['success'];
                echo "<script>alert('$t')</script>";
            }
            
            
            $this->load->view('cadastro_professor',$data2);
        }
    }
    
    
    public function remover(){
        $this->load->view('removerProfessorAdmin');
    }


    public function remove() {
        if (isset($_POST['cpf'])) {
            $data = array();
            $data['cpf'] = $_POST['cpf'];
            
            $this->load->model('Professor_model');
            $result = $this->Professor_model->doRemoveProfessor($data);
            
            
            
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user);

            $data2 = array('nome' => $nome, 'menus' => $menus);

            if (isset($result['error'])) {
                $data2['result'] = $result['error'];
            }else{
                $data2['result'] = $result['success'];
            }
            
            $this->load->view('removerProfessorAdmin',$data2);
        }
    }
    
    public function buscar() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['username'];
        
        $CI = $this->get_instance();
        $CI->load->model('professor_model');
        $escolas = $CI->professor_model->getEscolas($user);
        $alunos = $CI->professor_model->getAlunos($user);
        
        $data = array('nome' => $nome, 'alunos' => $alunos, 'escolas' => $escolas);
        $this->load->view('consultasProfessor', $data);
    }
    
    public function mostrar(){
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $cpf = $loggedUser['username'];
        
        
        $genero = '*';
        $faixa1 = '*';
        $faixa2 = '*';
        $classificacao = '*';
        $escola = '*';
        $aluno = '*';
        
        if(isset($_POST['checkGenero'])){
            if(isset($_POST['Masculino'])){
                $genero = 'Masculino';
            }
            else{
                $genero = 'Feminino';
            }
        }
        
        if(isset($_POST['checkFaixa'])){
            $faixa1 = $_POST['faixa1'];
            $faixa2 = $_POST['faixa2'];
        }
        
        if(isset($_POST['checkEscola'])){
            $escola = $_POST['escola'];
        }
        
        if(isset($_POST['checkAluno'])){
            $aluno = $_POST['aluno'];
        }
        
        $data = array('nome' => $nome, 'cpf' => $cpf, 'genero' => $genero,
            'faixa1' => $faixa1, 'faixa2' => $faixa2, 'classificacao' => $classificacao,
            'escola' => $escola, 'aluno' => $aluno);

        $CI = $this->get_instance();
        $CI->load->model('professor_model');
        $result = $CI->professor_model->get($data);
        $data1 = array('avaliacoes' => $result);
        $this->load->view('consultasGraficos', $data1);
    }
    
    /*public function buscarGenero() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus, 'genero' => 0);


        $this->load->view('buscaGenero_professor', $data);
    }
    
    public function buscarFaixaEtaria() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus);


        $this->load->view('buscaFaixaEtaria_professor', $data);
    }
    
    public function buscarAluno() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus);


        $this->load->view('buscaALuno_professor', $data);
    }

    public function mostrarAll() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $loggedUser['username']);

        $CI = $this->get_instance();
        $CI->load->model('professor_model');
        $result = $CI->professor_model->getAll($data);
        $data['aval'] = $result;
        $this->load->view('mostraTudo_professor', $data);
    }
    
    public function mostrarGenero() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $cpf = $loggedUser['username'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        if(isset($_POST['Masculino'])){
            $genero = 'Masculino';
        }
        else{
            $genero = 'Feminino';
        }
        
        echo $genero;
        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf, 'genero' => $genero);

        $CI = $this->get_instance();
        $CI->load->model('professor_model');
        $result = $CI->professor_model->getGenero($data);
        $data['aval'] = $result;
        $this->load->view('mostraGenero_professor', $data);
    }
    
    public function mostrarFaixaEtaria() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $cpf = $loggedUser['username'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        if(isset($_POST['idade'])){
            $idade = $_POST['idade'];
        }
        $init = 2013 - $idade;
        $final = $init+1;
        echo $init, $final;
        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf, 'init' => $init, 'final' => $final );

        $CI = $this->get_instance();
        $CI->load->model('professor_model');
        $result = $CI->professor_model->getFaixaEtaria($data);
        $data['aval'] = $result;
        $this->load->view('mostrarFaixaEtaria_professor', $data);
    }
    
    
    public function mostrarAluno() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $cpf = $loggedUser['username'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        if(isset($_POST['idAluno'])){
            $idAluno = $_POST['idAluno'];
        }
        
        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf, 'idAluno' => $idAluno);

        $CI = $this->get_instance();
        $CI->load->model('professor_model');
        $result = $CI->professor_model->getAluno($data);
        $data['aval'] = $result;
        $this->load->view('mostraAluno_professor', $data);
    }*/
    
}

?>
