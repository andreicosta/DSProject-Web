<?php

class Login extends CI_Controller {

    private $loggedUser = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

    public function login($username, $password) {
        $password = md5($password);
        $resultAdm = mysqli_query($this->dbc->getLink(), "SELECT nome FROM Administrador
            WHERE cpf = '$username' AND senha = '$password'");
        if ($resultAdm) {
            $row1 = mysqli_fetch_array($resultAdm);
            if ($row1[0] != NULL) {
                $d = array('username' => $username, 'nome' => $row1['nome'], 'user' => 'administrador');
                $this->loggedUser = array('nome'=>$row1['nome'],'user' => 'administrador');
                $this->session->set_userdata(array('loggedUser' => $d));
                return true;
            }
        }

        $resultProf = mysqli_query($this->dbc->getLink(), "SELECT nome FROM Professor
            WHERE cpf = $username AND senha = '$password'");
        if ($resultProf) {
            $row = mysqli_fetch_array($resultProf);
            if ($row[0] != NULL) {
                $d = array('username' => $username, 'nome' => $row['nome'], 'user' => 'professor');
                $this->loggedUser = array('nome'=>$row['nome'],'user' => 'professor');
                $this->session->set_userdata(array('loggedUser' => $d));
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    
    public function logout(){
        $this->session->sess_destroy('loggedUser');
        redirect('welcome');
    }

    public function getLoggedUser() {
        return $this->loggedUser;
    }

}

?>
