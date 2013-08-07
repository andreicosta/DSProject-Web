<?php

class Estado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

    public function getEstados() {
        $result = mysqli_query($this->dbc->getLink(), "SELECT * FROM Estado");
        $estados = array();
        while ($row = mysqli_fetch_array($result)) {
            $estados[$row['idEstado']] = $row['nome'];
        }
        return $estados;
    }

    public function getCidades() {
        $est = NULL;
        if (isset($_GET['estado'])) {
            $est = $_GET['estado'];
        } else {
            $est = "Rio Grande do Sul";
        }

        $result = mysqli_query($this->dbc->getLink(), "SELECT * FROM
                Cidade WHERE Estado_idEstado = $est");

        if(!$result){
            echo "ERRO no select";
        }
        
        $cidades = array();
        while ($row = mysqli_fetch_array($result)) {
            $cidades[$row['idCidade']] = $row['nome'];
        }
        echo json_encode($cidades);
    }
    
    public function getEscolas(){
        $numCidade = NULL;
        if (isset($_GET['cidade'])) {
            $numCidade = $_GET['cidade'];
            $idEstado = $_GET['estado'];
        } else {
            $idCidade = 7754;
        }
        
        $query = "SELECT idCidade FROM Cidade WHERE Estado_idEstado = $idEstado";
        
        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Cidade não encontrada');
            return $error;
        }

        $primCidade = mysqli_fetch_array($result);
        $idCidade = $primCidade['idCidade'] + $numCidade - 1;
        
        //echo $idCidade;
        
        $result = mysqli_query($this->dbc->getLink(), "SELECT * FROM
                Escola WHERE Cidade_idCidade = $idCidade");

        if(!$result){
            echo "ERRO no select";
        }
        
        $escolas = array();
        while ($row = mysqli_fetch_array($result)) {
            $escolas[$row['idEscola']] = $row['nome'];
        }
        echo json_encode($escolas);
    }

}

?>
