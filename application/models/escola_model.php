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
    
    public function doRemoveEscola($dados) {
        $nome = $dados['nome'];
        $idEscola = $dados['idEscola'];
        $idCidade = $dados['idCidade'];
        
        /*Excluir escola da tabela*/
        $query = "DELETE FROM Escola WHERE 
            Cidade_idCidade='$idCidade' AND nome='$nome' AND idEscola='$idEscola'";

        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel realizar a exclusão no BD.');
            return $error;
        }
        /*Termino excluir professor*/
        
        /*Excluir Escola na tabela Escola_Professor*/
        $query = "DELETE FROM Escola_Professor WHERE
            Escola_idEscola='$idEscola'";
        
        echo $query;
        
        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel Excluir a Escola
                na tabela Escola_Professor.');
            return $error;
        }
        /*Fim Exclusão*/


        $result = array('success' => 'Escola removido com sucesso');
        return $result;
    }
    

}

?>
