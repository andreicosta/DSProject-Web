<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    private $login = NULL;

    public function __construct() {
        parent::__construct();
        require_once 'application/controllers/login.php';
        require_once 'application/controllers/menu.php';
        require_once 'application/controllers/estado.php';
        $this->login = new Login();
    }

    public function index() {
        $loggedUser = $this->session->userdata('loggedUser');
        if (isset($loggedUser['nome'])) {
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];
            $menu = new Menu();
            $menus = $menu->getMenus($user);
            $data = array('nome' => $nome, 'menus' => $menus);
            $this->load->view('logado', $data);
        } else {
            $this->load->view('index');
        }
    }

    public function login() {
        if ($this->login->login($_POST['username'], $_POST['password'])) {
            $logado = $this->login->getLoggedUser();
            $nome = $logado['nome'];
            $user = $logado['user'];

            $menu = new Menu();
            $menus = $menu->getMenus($user);

            $data = array('nome' => $nome, 'menus' => $menus);
            $this->load->view('logado', $data);
        } else {
            $this->session->set_flashdata('ConnectionError', 'Erro no Login');
            $this->load->view('index');
            //redirect('welcome');
        }
    }

    public function cadastro() {
        $estado = new Estado();
        $data = array('estados' => $estado->getEstados());
        $this->load->view('cadastro',$data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
