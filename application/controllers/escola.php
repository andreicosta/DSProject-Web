<?php

class Escola extends CI_Controller {

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

        //$CI = $this->get_instance();
        $estado = new Estado();

        $data = array('nome' => $nome, 'menus' => $menus, 'estados' => $estado->getEstados());
        $this->load->view('cadastro_escola', $data);
    }

    public function add() {
        $this->form_validation->set_rules('nome', 'NOME', 'required|min_length[6]');
        //$this->form_validation->set_rules('cnpj', 'CNPJ', 'required|min_length[6]');
        if ($this->form_validation->run() == true) {

            if (isset($_POST['nome'])) {
                $data = array();
                $data['nome'] = $_POST['nome'];
                $data['cnpj'] = $_POST['cnpj'];
                $data['telefone'] = $_POST['telefone'];
                $data['email'] = $_POST['email'];
                $data['idEstado'] = $_POST['estados'];
                $data['idCidade'] = $_POST['cidades'];

                $this->load->model('Escola_model');
                $result = $this->Escola_model->doAddEscola($data);

                $loggedUser = $this->session->userdata('loggedUser');
                $nome = $loggedUser['nome'];
                $user = $loggedUser['user'];
                $menu = new Menu();
                $menus = $menu->getMenus($user);

                $data1 = array('nome' => $nome, 'menus' => $menus);

                if (isset($error['error'])) {
                    $data1['result'] = $result['error'];
                } else {
                    $data1['result'] = $result['success'];
                }

                $this->load->view('result_cadastro_escola', $data1);
            }
        } else {
            $temp = validation_errors();
//            echo $temp;
            $loggedUser = $this->session->userdata('loggedUser');
            $nome = $loggedUser['nome'];
            $user = $loggedUser['user'];

            $menu = new Menu();
            $menus = $menu->getMenus($user);

            //$CI = $this->get_instance();
            $estado = new Estado();
            

            $data = array('nome' => $nome, 'menus' => $menus, 'estados' => $estado->getEstados(),
                'validation'=> $temp);
            $this->form_validation->run();
            $this->load->view('cadastro_escola', $data);
        }
    }

}

?>
