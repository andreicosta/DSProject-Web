<?php

class Avaliacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
        //$this->load->model('Avaliacao_model');
    }

    public function addAvaliacao($data) {
        $CI = $this->get_instance();
        $CI->load->model('Avaliacao_model');
        return $CI->Avaliacao_model->do_addAvaliacao($data);
    }

}

?>
