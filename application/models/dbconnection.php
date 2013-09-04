<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DBConnection extends CI_Model{

    private $link = NULL;

    public function __construct() {
       
        parent::__construct();
        mysql_set_charset('utf8');
        $this->link = mysqli_connect('localhost', 'root', '');
        
        if (!$this->link) {
            $this->session->set_flashdata('ConnectionError', 'Erro ao conectar ao Servidor');
            //redirect('welcome');
        }  else {
            //echo 'bunda';
        }

        if (!mysqli_select_db($this->link, 'ProDown')) {
            $this->session->set_flashdata('ConnectionError', 'Erro ao conectar ao banco de dados Prodown');
            //redirect('welcome');
        }
    }
    
    public function getLink(){
        return $this->link;
    }



}

?>
