<?php

class Professor_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection','dbc');
    }
    
    public function getProfessores() {
        $result = mysqli_query($this->dbc->getLink(), "SELECT * FROM Professor");
        $profes = array();
        while ($row = mysqli_fetch_array($result)) {
            $profes[$row['nome']] = $row['nome'];
        }
        return $profes;
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
    
    public function doRemoveProfessor($dados){
        $cpf = $dados['cpf'];

        /*Excluir o professor do sistema*/
        $query = "DELETE FROM Professor WHERE 
            cpf='$cpf'";

        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel realizar a remoção do
                Professor no BD.');
            return $error;
        }
        /*Fim da exclusão*/
        
        /*Excluir Professor na tabela Escola_Professor*/
        $query = "DELETE FROM Escola_Professor WHERE
            cpf='$cpf'";
        
        echo $query;
        
        $result = mysqli_query($this->dbc->getLink(), $query);

        if (!$result) {
            $error = array('error' => 'Não foi possivel Excluir o Professor
                na tabela Escola_Professor.');
            return $error;
        }
        /*Fim Exclusão*/


        $result = array('success' => 'Professor removido com sucesso');
        return $result;
    }
    
      public function get($dados){
        $cpf = $dados['cpf'];
        $genero = $dados['genero'];
        $faixa1 = $dados['faixa1'];
        $faixa2 = $dados['faixa2'];
        $classificacao = $dados['classificacao'];
        $escola = $dados['escola'];
        $aluno = $dados['aluno'];
        
        $query = "SELECT data, horario, temperatura, massaCorporal, nome FROM `Avaliacao` AS AV
	INNER JOIN `Aluno` AS A ON `AV`.`Aluno_idAluno` = `A`.`idAluno`
	INNER JOIN `Escola_Professor` AS EP ON `EP`.`Escola_idEscola` = `A`.`Escola_idEscola` AND `EP`.`Professor_cpf` = `A`.`Professor_cpf`
	WHERE `EP`.`Professor_cpf` = '$cpf'";
        
        
        if(strcmp($genero, "*") != 0){
            echo 'chegougenero';            
            $query = $query . " AND A.genero = '$genero' ";
        }
        
        if(strcmp($faixa1, "*") != 0){
            echo 'chegoufaixa1';
            $query = $query . " AND A.nascimento >= '$faixa1' ";
        }
        
        if(strcmp($faixa2, "*") != 0){
            echo 'chegoufaixa2';
            $query = $query . " AND A.nascimento <= '$faixa2' ";
        }
        
        //if($classificacao != '*'){
          //  $query = $query + " AND A.genero = '$genero' ";
        //}
        
        if(strcmp($aluno, "*") != 0){
            echo 'chegoualuno';
            $query = $query . " AND A.nome = '$aluno' ";
        }
        
        if(strcmp($escola, "*") != 0){
            echo 'chegouescola';
            $query = $query . " AND EP.Escola_idEscola = '$escola' ";
        }
        
        $result = mysqli_query($this->dbc->getLink(), $query);
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('data', 'horario', 'temperatura', 'massaCorporal', 'nome');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['data'];
            $temp[] = $row['horario'];
            $temp[] = $row['temperatura'];
            $temp[] = $row['massaCorporal'];
            $temp[] = $row['nome'];
            $array[] = $temp;
        }
        return $array;
    }
    
    public function getEscolas($cpf){
        $query = "SELECT Escola_Professor.Escola_idEscola FROM Escola_Professor 
        Where Escola_Professor.Professor_cpf = '$cpf'"; 
        $result = mysqli_query($this->dbc->getLink(), $query);
        
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $array = $row;
        }
        return $array;
    }
    
    public function getAlunos($cpf){
        
        $query = "SELECT Aluno.nome FROM Aluno 
        Where Aluno.Professor_cpf = '$cpf'"; 
        $result = mysqli_query($this->dbc->getLink(), $query);
        
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row['nome'];
        }
        return $array;
    }
    /*public function getAll($dados){
        $cpf = $dados['cpf'];
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Aluno.idAluno, Aluno.nascimento, Aluno.genero, Aluno.endereco, Aluno.nomeDaMae, Aluno.nomeDoPai, Aluno.telefone, Aluno.celular, Aluno.email FROM Aluno
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = Aluno.Professor_cpf AND EP.Escola_idEscola = Aluno.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf'");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('Nome', 'IdAluno', 'Data de Nascimento', 'Genero', 'Endereço', 'Nome da Mae', 'Nome do Pai', 'Telefone','Celular', 'Email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['idAluno'];
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
        echo $genero;
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Aluno.nascimento, Aluno.endereco, Aluno.nomeDaMae, Aluno.nomeDoPai, Aluno.telefone, Aluno.celular, Aluno.email FROM Aluno
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = Aluno.Professor_cpf AND EP.Escola_idEscola = Aluno.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf' AND Aluno.genero = '$genero'");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('Nome', 'Data de Nascimento', 'Endereço', 'Genero', 'Nome da Mae', 'Nome do Pai', 'Telefone','Celular', 'Email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['endereco'];
            $temp[] = $genero;
            $temp[] = $row['nomeDaMae'];
            $temp[] = $row['nomeDoPai'];
            $temp[] = $row['telefone'];
            $temp[] = $row['celular'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
    }
 
    public function getFaixaEtaria($dados){
        $cpf = $dados['cpf'];
        $init = $dados['init'];
        $final = $dados['final'];
        
        echo $init, $final;
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Aluno.nascimento, Aluno.genero, Aluno.endereco, Aluno.nomeDaMae, Aluno.nomeDoPai, Aluno.telefone, Aluno.celular, Aluno.email FROM Aluno
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = Aluno.Professor_cpf AND EP.Escola_idEscola = Aluno.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf' AND Aluno.nascimento >= '$init' AND Aluno.nascimento <= '$final'");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('Nome', 'Data de Nascimento', 'Endereço', 'Genero', 'Nome da Mae', 'Nome do Pai', 'Telefone','Celular', 'Email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['endereco'];
            $temp[] = $row['genero'];
            $temp[] = $row['nomeDaMae'];
            $temp[] = $row['nomeDoPai'];
            $temp[] = $row['telefone'];
            $temp[] = $row['celular'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
    }
    
    
    public function getAluno($dados){
        $cpf = $dados['cpf'];
        $idAluno = $dados['idAluno'];
        
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Avaliacao.numAvaliacao, Avaliacao.data, Avaliacao.horario, Avaliacao.temperatura, Avaliacao.massaCorporal, Avaliacao.estatura, Avaliacao.imc, Avaliacao.envergadura, Avaliacao.sentarEAlcancar, Avaliacao.sentarEAlcancarComBanco, Avaliacao.abdominal, Avaliacao._9Minutos, Avaliacao._6Minutos, Avaliacao.saltoHorizontal, Avaliacao.arremessoMedicineBall, Avaliacao.testeDoQuadrado, Avaliacao.corrida20Metros
            FROM Avaliacao
            INNER JOIN Aluno ON Avaliacao.Aluno_idAluno = Aluno.idAluno
            WHERE Aluno.Professor_cpf = '$cpf' AND Aluno.idAluno = '$idAluno'
            ORDER BY data");
        if (!$result) {
            $error = array('error' => 'Não foi possivel Buscar os dados.');
            return $error;
        }
        
        $array = array();
        $array[] = array('Nome', 'Avaliacao', 'Data', 'Hora', 'Temp', 'Massa', 'Estatura', 'IMC', 'Envergadura', 'Sentar e Alcancar', 'Com Banco', 'Abdominal', '9 min', '6 min', 'Salto Horizontal', 'Arremesso', 'Quadrado', 'Corrida 20m');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['numAvaliacao'];
            $temp[] = $row['data'];
            $temp[] = $row['horario'];
            $temp[] = $row['temperatura'];
            $temp[] = $row['massaCorporal'];
            $temp[] = $row['estatura'];
            $temp[] = $row['imc'];
            $temp[] = $row['envergadura'];
            $temp[] = $row['sentarEAlcancar'];
            $temp[] = $row['sentarEAlcancarComBanco'];
            $temp[] = $row['abdominal'];
            $temp[] = $row['_9Minutos'];
            $temp[] = $row['_6Minutos'];
            $temp[] = $row['saltoHorizontal'];
            $temp[] = $row['arremessoMedicineBall'];
            $temp[] = $row['testeDoQuadrado'];
            $temp[] = $row['corrida20Metros'];
            $array[] = $temp;
        }
        return $array;
    }*/
    
}

?>
