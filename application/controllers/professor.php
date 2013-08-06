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


        $menu = new Menu();
        $menus = $menu->getMenus($user);
        $estado = new Estado();
        
        $data = array('nome' => $nome, 'menus' => $menus,'estados' => $estado->getEstados());
        $this->load->view('cadastro_professor', $data);
    }
    
    public function add() {
        if (isset($_POST['nome'])) {
            $data = array();
            $data['nome'] = $_POST['nome'];
            $data['cpf'] = $_POST['cpf'];
            $data['senha'] = $_POST['senha'];
            $data['email'] = $_POST['email'];
            $data['idEscola'] = $_POST['escolas'];
            
            $this->load->model('Professor_model');
            $result = $this->Professor_model->doAddProfessor($data);
            
            
            
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
            
            $this->load->view('result_cadastro_escola',$data2);
        }
    }
    
    public function buscarGenero() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus);


        $this->load->view('buscaGenero_professor', $data);
    }
    
    /*public function buscarFaixaEtaria() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus);


        $this->load->view('buscaFaixaEtaria_professor', $data);
    }
    
    public function buscarClassificacao() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome, 'menus' => $menus);


        $this->load->view('buscaClassificacao_professor', $data);
    }*/
    
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
        $cpf = $loggedUser['cpf'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf);

        $CI->load->model('professor_model');
        $result = $CI->professor_model->getAll();
        $data['aval'] = $result;
        $this->load->view('mostraGenero_professor', $data);
    }
    
    /*public function mostrarFaixaEtaria() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $cpf = $loggedUser['cpf'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        $estado = new Estado();

        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf);

        $CI->load->model('professor_model');
        $result = $CI->professor_model->getAll();
        $data['aval'] = $result;
        $this->load->view('mostraFaixaEtaria_professor', $data);
    }
    
    public function mostrarClassificacao() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $cpf = $loggedUser['cpf'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        $estado = new Estado();

        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf);

        $CI->load->model('professor_model');
        $result = $CI->professor_model->getAll();
        $data['aval'] = $result;
        $this->load->view('mostraClassificacao_professor', $data);
    }*/
    
    public function mostrarAluno() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $cpf = $loggedUser['cpf'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        $aluno = new Aluno();

        $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf);

        $CI->load->model('professor_model');
        $result = $CI->professor_model->getAll();
        $data['aval'] = $result;
        $this->load->view('mostraAluno_professor', $data);
    }
    
}

?>
