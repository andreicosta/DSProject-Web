<?php

class Aluno extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection','dbc');
    }

    public function addAluno($data) {
        //Fazer verificacao nos dados
        $CI = $this->get_instance();
        $CI->load->model('Aluno_model');
        return $CI->Aluno_model->do_addAluno($data);
    }

}

?>
