<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

    
     public function get($dados){
        $cpf = $dados['cpf'];
        $genero = $dados['genero'];
        $faixa1 = $dados['faixa1'];
        $faixa2 = $dados['faixa2'];
        $classificacao = $dados['classificacao'];
        $escola = $dados['escola'];
        $aluno = $dados['aluno'];
        
        $result = mysqli_query($this->dbc->getLink(), "SELECT Aluno.nome, Aluno.nascimento, Aluno.endereco, Aluno.nomeDaMae, Aluno.nomeDoPai, Aluno.telefone, Aluno.celular, Aluno.email FROM Aluno
            INNER JOIN Escola_Professor AS EP ON EP.Professor_cpf = Aluno.Professor_cpf AND EP.Escola_idEscola = Aluno.Escola_idEscola
            WHERE EP.Professor_cpf = '$cpf' AND Aluno.genero = '$genero' AND Aluno.classificacao = '$classificacao' AND Aluno.escola = '$escola'
                AND Aluno.nome = '$aluno' AND Aluno.nascimento >= '$faixa1' AND Aluno.nascimento <= '$faixa2'");
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

    public function getAvaliacoesEstado($data) {
        $idEstado = $data['idEstado'];
        $query = "SELECT Aluno.nome, Avaliacao.numAvaliacao, Avaliacao.data, Avaliacao.horario, Avaliacao.temperatura, Avaliacao.massaCorporal, Avaliacao.estatura, Avaliacao.imc, Avaliacao.envergadura, Avaliacao.sentarEAlcancar, Avaliacao.sentarEAlcancarComBanco, Avaliacao.abdominal, Avaliacao._9Minutos, Avaliacao._6Minutos, Avaliacao.saltoHorizontal, Avaliacao.arremessoMedicineBall, Avaliacao.testeDoQuadrado, Avaliacao.corrida20Metros
            FROM (Avaliacao INNER JOIN Aluno ON Aluno.idAluno = Avaliacao.Aluno_idAluno)
            JOIN Escola ON Aluno.Escola_idEscola = Escola.idEscola
            JOIN Cidade ON Escola.Cidade_idCidade = Cidade.idCidade
            JOIN Estado ON Cidade.Estado_idEstado = Estado.idEstado
            WHERE Estado.idEstado = $idEstado";
        //echo $idEstado;
        $result = mysqli_query($this->dbc->getLink(), $query);
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
        //return $result;
    }

    public function getAvaliacoes() {
        
        $query = "SELECT Aluno.nome, Avaliacao.numAvaliacao, Avaliacao.data, Avaliacao.horario, Avaliacao.temperatura, Avaliacao.massaCorporal, Avaliacao.estatura, Avaliacao.imc, Avaliacao.envergadura, Avaliacao.sentarEAlcancar, Avaliacao.sentarEAlcancarComBanco, Avaliacao.abdominal, Avaliacao._9Minutos, Avaliacao._6Minutos, Avaliacao.saltoHorizontal, Avaliacao.arremessoMedicineBall, Avaliacao.testeDoQuadrado, Avaliacao.corrida20Metros
            FROM (Avaliacao INNER JOIN Aluno ON Aluno.idAluno = Avaliacao.Aluno_idAluno)";
        //echo $idEstado;
        $result = mysqli_query($this->dbc->getLink(), $query);
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
        //return $result;
    }
    public function findProfessor($cpf){
        
        $query = "SELECT * FROM `Avaliacao` AS AV
	INNER JOIN `Aluno` AS A ON `AV`.`Aluno_idAluno` = `A`.`idAluno`
	INNER JOIN `Escola_Professor` AS EP ON `EP`.`Escola_idEscola` = `A`.`Escola_idEscola` AND `EP`.`Professor_cpf` = `A`.`Professor_cpf`
	WHERE `EP`.`Professor_cpf` = $cpf
	ORDER BY data";
        
        $result = mysqli_query($this->dbc->getLink(), $query);
        $array = array();
        $array[] = array();
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
    }
    public function adm_FindGender($dados){
        $cpf = $dados['cpf'];
        $genero = $dados['genero'];
        
        $result = mysqli_query($this->dbc->getLink(),"SELECT Aluno.nome, Aluno.nascimento, Aluno.endereco, Aluno.email FROM Aluno WHERE  Aluno.genero = '$genero'");
        
        $array = array();
        $array[] = array('Nome', 'nascimento', 'endereco', 'email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['endereco'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
    }
    
    
    public function adm_findFaixa($opt){
        $query = " SELECT Aluno.nome, Aluno.nascimento, Aluno.genero, Aluno.endereco, Aluno.email FROM Aluno 
            WHERE (YEAR(CURDATE())- YEAR(Aluno.nascimento)) - (RIGHT(CURDATE(),5)< RIGHT(Aluno.nascimento,5)) = '$opt'"; 
            //(Floor(datediff(d, Aluno.nascimento, getdate()) / 365.25)) = '$opt'";
        
        $result = mysqli_query($this->dbc->getLink(), $query);
        
        $array = array();
        $array[] = array('Nome','nascimento', 'genero', 'endereco', 'email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['genero'];
            $temp[] = $row['endereco'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
       
    }
    public function findEscola($nomeescola){
        //echo $nomeescola;
        $query = "SELECT Escola.idEscola FROM Escola Where Escola.nome = '$nomeescola'"; 
        $result = mysqli_query($this->dbc->getLink(), $query);
        
        
        $row = mysqli_fetch_array($result);
        $id = $row['idEscola'];
        
        $queryi = "SELECT Aluno.nome, Aluno.nascimento, Aluno.genero, Aluno.endereco, Aluno.email FROM Aluno
            WHERE Aluno.Escola_idEscola = '$id'";
        
        $result = mysqli_query($this->dbc->getLink(), $queryi);
        $array[] = array('Nome', 'nascimento', 'endereco', 'email');
        while ($row = mysqli_fetch_array($result)) {
            unset($temp);
            $temp[] = $row['nome'];
            $temp[] = $row['nascimento'];
            $temp[] = $row['endereco'];
            $temp[] = $row['email'];
            $array[] = $temp;
        }
        return $array;
    }
    
    
}
?>
