<?php

class Escola_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

public function doAddEscola($dados) {
        $nome = $dados['nome'];
        $idEstado = $dados['idEstado'];
        //$idCidade = $dados['idCidade'];
	$idCidade = rand(10, 100000);
		
        $query = "INSERT INTO Escola(idEscola,Cidade_idCidade,nome) VALUES 
            (6,".$idCidade.',"'.$nome.'")';

        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $result = array('msg' => 'Não foi possivel realizar a inserção no BD.');
            return $result;
        }

        $result = array('msg' => 'Escola inserida com sucesso');
        return $result;
    }
    
    public function doRemoveEscola($dados) {
        $idEscola = $dados['idEscola'];
        
        /*Excluir escola da tabela*/
        $query = "DELETE FROM Escola WHERE 
            idEscola='$idEscola'";

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
