<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once 'application/controllers/menu.php';
        require_once 'application/controllers/estado.php';
    }

    public function buscarAvaliacao() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        $estado = new Estado();
        $estados = $estado->getEstados();
        array_unshift($estados, "");
        $data = array('nome' => $nome, 'menus' => $menus, 'estados' => $estados);


        $this->load->view('busca_admin', $data);
    }

    public function mostrarAvaliacao() {

        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);

        $estado = new Estado();

        $data = array('nome' => $nome, 'menus' => $menus, 'estados' => $estado->getEstados());
        
        if (isset($_POST['estados'])) {
            if ($_POST['estados'] == 0) {
                $CI = $this->get_instance();
                $CI->load->model('Admin_model');
                $result = $CI->Admin_model->getAvaliacoes();
                $data['aval'] = $result;
                $this->load->view('mostra_avaliacao', $data);
            } else {
                $this->load->model('Admin_model');
                $result = $this->Admin_model->getAvaliacoesEstado(array('idEstado' => $_POST['estados']));
                $data['aval'] = $result;
                $this->load->view('mostra_avaliacao', $data);
            }
        }
    }
    public function buscaProf(){
            echo 'controler buscaProf()';
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
            $this->load->view('inserirPesqProf',array('nome'=>$nome,'menus'=>$menus));
            
    }
    
    public function procuraprof(){
        // pega os dados com $_POST e manda pro model
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
            $cpf = $_POST['cpf'];
            $this->load->model('Admin_model');
            echo 'TACHEGANDO AUQIIIIII BITCHH PLEASE';
            $aux = $this->get_instance(); // isso aqui é um bug da linha 77 
            $aux->load->model('Admin_model'); 
            $result = $aux->Admin_model->findProfessor($cpf);
            $this->load->view('mostrarPesqProf',array('result' =>$result, 'nome'=>$nome,'menus'=>$menus));
        
    }

    public function buscagenero(){
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
        
            $this->load->view('adm_selectgenero',array('nome'=>$nome,'menus'=>$menus));
    }
    public function adm_filtragenero(){
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $cpf = $loggedUser['username'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
             if(isset($_POST['Masculino'])){
                    $genero = 'Masculino';
            }
            else{
                $genero = 'Feminino';
            }
            
            $data = array('nome' => $nome, 'menus' => $menus, 'cpf' => $cpf, 'genero' => $genero);
            $aux = $this->get_instance();
            $aux->load->model('Admin_model'); 
            $result = $aux->Admin_model->adm_FindGender($data);
            $this->load->view('adm_mostrarPesqGender',array('result' =>$result, 'nome'=>$nome,'menus'=>$menus));
            
    }
    
    public function buscafaixaet(){
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
            $this->load->view('adm_selectfaixa',array('nome'=>$nome,'menus'=>$menus));
    }
    
    public function adm_filtrafaixa(){
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
            $opt = $_POST['myfilter'];
            $aux = $this->get_instance();
            $aux->load->model('Admin_model'); 
            $result = $aux->Admin_model->adm_findFaixa($opt);
            $this->load->view('adm_mostrarPesqGender',array('result' =>$result, 'nome'=>$nome,'menus'=>$menus));
            
    }
    
    public function buscaEscola(){
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
            $this->load->view('adm_buscaEscola',array('nome'=>$nome,'menus'=>$menus));
    }
    
    
    public function procuroAlunoEscola(){
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user); // tem que adicionar o link para o botao
            
            $nomeescola = $_POST['nome'];
            $this->load->model('Admin_model');
            $aux = $this->get_instance(); // isso aqui é um bug da linha 77 
            $aux->load->model('Admin_model'); 
            $result = $aux->Admin_model->findEscola($nomeescola);
            $this->load->view('mostrarPesqProf',array('result' =>$result, 'nome'=>$nome,'menus'=>$menus));
        
    }
}

?>
