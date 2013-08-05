<?php

class Escola_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

    public function doAddEscola($dados) {
        $nome = $dados['nome'];
        $cnpj = $dados['cnpj'];
        $telefone = $dados['telefone'];
        $email = $dados['email'];
        $idEstado = $dados['idEstado'];
        $idCidade = $dados['idCidade'];

        $query = "INSERT INTO Escola(idEscola,Cidade_idCidade,nome) VALUES 
            ('NULL',$idCidade,'$nome')";

        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel realizar a inserção no BD.');
            return $error;
        }

        $result = array('success' => 'Escola inserida com sucesso');
        return $result;
    }

}

?>
