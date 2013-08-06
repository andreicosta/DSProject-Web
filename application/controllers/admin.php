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

}

?>
