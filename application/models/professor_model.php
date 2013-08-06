<?php

class Professor_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection','dbc');
    }
    
    public function doAddProfessor($dados) {
        $nome = $dados['nome'];
        $cpf = $dados['cpf'];
        $senha = md5($dados['senha']);
        $email = $dados['email'];
        $idEscola = $dados['idEscola'];

        /*Inserir professor antes de inserir ele na tabela Escola_Professor*/
        $query = "INSERT INTO Professor(cpf,nome,senha,email) VALUES 
            ('$cpf','$nome','$senha','$email')";

        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel realizar a inserção do
                Professor no BD.');
            return $error;
        }
        /*Fim da insersão*/
        
        /*Inserir Professor na tabela Escola_Professor*/
        $query = "INSERT INTO Escola_Professor(Escola_idEscola,Professor_cpf)
            VALUES ($idEscola,'$cpf')";
        
        echo $query;
        
        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel Inserir o Professor
                na tabela Escola_Professor.');
            return $error;
        }
        /*Fim Insersão*/


        $result = array('success' => 'Professor inserido com sucesso');
        return $result;
    }
   
}

?>
