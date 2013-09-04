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
                'validation' => $temp);
            $this->form_validation->run();
            $this->load->view('cadastro_escola', $data);
        }
    }
    
    public function remover(){
        $this->load->view('removerEscolaAdmin');
    }
    
    public function remove() {
        if (isset($_POST['idEscola'])) {
            $data = array();
            $data['idEscola'] = $_POST['idEscola'];

            $this->load->model('Escola_model');
            $result = $this->Escola_model->doRemoveEscola($data);

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

            $this->load->view('removerEscolaAdmin', $data1);
        }
    }

    public function solicita() {
        $estado = new Estado();
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $cnpj = $_POST['cnpj'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $idEstado = $_POST['estados'];
            $idCidade = $_POST['cidades'];

            $message = "Nome: $nome\r\n
                    CNPJ: $cnpj\r\n
                    Telefone: $telefone\r\n
                    Email: $email\r\n
                    Estado: $idEstado\r\n
                    Cidade: $idCidade";

            $message = wordwrap($message, 200, "\r\n");

            #mail('pazzinivinicius@gmail.com', 'Cadastro de Esocola', $message);

            $to = "pazzinivinicius@gmail.com";
            $subject = "Test mail";
            $from = "prodown@example.com";
            $headers = "From:" . $from;
            mail($to,$subject,$message,$headers);
            
            $data = array('validation' => "Solicitação Enviada com Sucesso",'estados'=>$estado->getEstados());
            $this->load->view('cadastro', $data);
        } else {
            $data = array('validation' => "Erro",'estados'=>$estado->getEstados());
            $this->load->view('cadastro',$data);
        }
    }

}

?>
