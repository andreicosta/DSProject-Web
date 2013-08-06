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
    
    public function getAll($dados){
        $cpf = $dados['cpf'];
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Aluno.nascimento, Aluno.genero, Aluno.endereco, Aluno.nomeDaMae, Aluno.nomeDoPai, Aluno.telefone, Aluno.celular, Aluno.email FROM Aluno
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = Aluno.Professor_cpf AND EP.Escola_idEscola = Aluno.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf'");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('Nome', 'Data de Nascimento', 'Genero', 'Endereço', 'Nome da Mae', 'Nome do Pai', 'Telefone','Celular', 'Email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['genero'];
            $temp[] = $row['endereco'];
            $temp[] = $row['nomeDaMae'];
            $temp[] = $row['nomeDoPai'];
            $temp[] = $row['telefone'];
            $temp[] = $row['celular'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
        //return $result;
    }
    
    public function getGenero($dados){
        $cpf = $dados['cpf'];
        $genero = $dados['genero'];
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Aluno.nascimento, Aluno.endereco, Aluno.nomeDaMae, Aluno.nomeDoPai, Aluno.telefone, Aluno.celular, Aluno.email FROM Aluno
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = Aluno.Professor_cpf AND EP.Escola_idEscola = Aluno.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf' AND Aluno.genero = $genero");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('Nome', 'Data de Nascimento', 'Endereço', 'Nome da Mae', 'Nome do Pai', 'Telefone','Celular', 'Email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['endereco'];
            $temp[] = $row['nomeDaMae'];
            $temp[] = $row['nomeDoPai'];
            $temp[] = $row['telefone'];
            $temp[] = $row['celular'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
    }
 
    /*public function getFaixaEtaria($dados){
        $cpf = $dados['cpf'];
        $result = mysqli_query($this->dbc->getLink(), "SELECT nome FROM Aluno AS A
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = A.Professor_cpf AND EP.Escola_idEscola = A.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf' AND Aluno.nascimento BETWEEN $");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
    }
    
    public function getClassificacao($dados){
        $cpf = $dados['cpf'];
        $result = mysqli_query($this->dbc->getLink(), "SELECT nome FROM Aluno AS A
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = A.Professor_cpf AND EP.Escola_idEscola = A.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf'");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
    }*/
    
    public function getAluno($dados){
        $cpf = $dados['cpf'];
        $escola = $dados['escola'];
        $idAluno = $dados['idAluno'];
        $result = mysqli_query($this->dbc->getLink(), "SELECT nome AS Nome FROM Aluno AS A
	INNER JOIN Escola_Professor AS EP ON EP.Escola_idEscola = A.Escola_idEscola AND EP.Professor_cpf = A.Professor_cpf
	WHERE EP.Professor_cpf = '$cpf' AND `EP`.`Escola_idEscola` = '$escola' AND A.idAluno = '$idAluno'");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
    }
    
}

?>
