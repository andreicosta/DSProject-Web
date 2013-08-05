<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        require_once 'application/controllers/xmlParser.php';
        require_once 'application/controllers/menu.php';
    }

    function index() {
        $loggedUser = $this->session->userdata('loggedUser');
        $nome = $loggedUser['nome'];
        $user = $loggedUser['user'];
        $menu = new Menu();
        $menus = $menu->getMenus($user);
        
        $data = array('nome' => $nome,'menus'=>$menus);
        $this->load->view('fazer_upload', $data);
    }

    function do_upload() {
        $config['upload_path'] = 'application/uploads';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $temp = $this->session->all_userdata();
            $data = array('nome' => $temp['nome'], 'error' => $this->upload->display_errors());
            $this->load->view('logado', $data);
        } else {
            //$temp = $this->session->all_userdata();
            //$data = array('nome'=>$temp['nome'],'upload_data' => $this->upload->data());
            $fileName = $this->upload->data()['file_name'];

            $parser = new XMLParser();
            $parser->parse($fileName);

            $data = array('nome' => $this->session->userdata('loggedUser')['nome'],'upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }

}

?>