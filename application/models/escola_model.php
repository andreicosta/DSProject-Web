<?php

class Escola_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }
    
    public function getEscolas() {
        $this->load->model('DBConnection', 'dbc');
        $result = mysqli_query($this->dbc->getLink(), "SELECT * FROM Escola");
        $escolas = array();
        while ($row = mysqli_fetch_array($result)) {
            $escolas[$row['idEscola']] = $row['nome'];
        }
        return $escolas;
    }

    public function doAddEscola($dados) {
        $nome = $dados['nome'];
        $cidade = $dados['cidade'];
	$idEscola = rand(10, 100000);

	$result = mysqli_query($this->dbc->getLink(), "SELECT * FROM Cidade WHERE nome = '$cidade'");
	$row = mysqli_fetch_array($result);
	$idCidade = $row['idCidade'];
		
        $query = "INSERT INTO Escola(idEscola,Cidade_idCidade,nome) VALUES ($idEscola,$idCidade,\"$nome\")";

	$result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel realizar a inserção da Escola no BD.');
            return $error;
        }

        $result = array('success' => $nome);
        return $result;
    }
    
    public function doRemoveEscola($dados) {
        $idEscola = $dados['idEscola'];
        
        /*Excluir escola da tabela*/
        $query = "DELETE FROM Escola WHERE 
            idEscola = '$idEscola'";
        
        //echo $idEscola . '<br>';
        
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
