<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
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
    }
    public function adm_FindGender($opt){
        //echo $opt ;
       // $query =  "SELECT * FROM `Avaliacao` 
         //          INNER JOIN `Aluno` ON (`Avaliacao`.`Aluno_idAluno` = `Aluno`.`idAluno`) 
           //        WHERE `Aluno`.`genero` = $opt " ;
        $query = "SELECT * FROM `Avaliacao` WHERE";
        echo $query;
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
    }
    
}

?>
