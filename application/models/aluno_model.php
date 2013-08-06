<?php

class Aluno_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

    public function do_addAluno($data) {
        $idAluno = $data['idAluno'];
        $idEscola = $data['idEscola'];
        $cpfProfessor = $data['cpfProfessor'];
        $nome = $data['nome'];
        $nascimento = $data['nasc'];
        $genero = $data['genero'];
        $endereco = $data['endereco'];
        $nomeMae = $data['nome_mae'];
        $nomePai = $data['nome_pai'];
        $telefone = $data['telefone'];
        $celular = $data['celular'];
        $email = $data['email'];

        //$query = "SELECT * FROM Aluno";
        $result1 = mysqli_query($this->dbc->getLink(), "SELECT idAluno FROM Aluno
            WHERE nome = '$nome' AND nomeDaMae = '$nomeMae'");
        if ($result1) {
            $row = mysqli_fetch_array($result1);
            if ($row[0] != NULL) {
                $error = array('error' => 'Aluno ja existente no banco de dados <br>', 'idAluno' => $row['idAluno']);
                return $error;
            }
        } else {
            $error = array('error' => 'Erro no select Aluno <br>');
            return $error;
        }
        /*
          while ($row = mysqli_fetch_array($result1)) {
          if ($row['nome'] == $nome && $row['nomeDaMae'] == $nomeMae) {
          $error = array('error' => 'Aluno ja existente no banco de dados','idAluno'=>$row['idAluno']);
          return $error;
          }
          } */

        $result = mysqli_query($this->dbc->getLink(), "INSERT INTO Aluno (idAluno, Escola_idEscola, Professor_cpf,
            nome, nascimento, genero, endereco, nomeDaMae, nomeDoPai, telefone, celular, email) VALUES
            ($idAluno, $idEscola, '$cpfProfessor', '$nome', '$nascimento', '$genero', '$endereco',
                '$nomeMae', '$nomePai', '$telefone', '$celular', '$email')");

        if (!$result) {
            $error = array('error' => "INSERT INTO Aluno (idAluno, Escola_idEscola, Professor_cpf,
            nome, nascimento, genero, endereco, nomeDaMae, nomeDoPai, telefone, celular, email) VALUES
            ($idAluno, $idEscola, '$cpfProfessor', '$nome', '$nascimento', '$genero', '$endereco',
                '$nomeMae', '$nomePai', '$telefone', '$celular', '$email')");
            return $error;
            //$this->load->view('logado', $error);
        }
        
        $result1 = mysqli_query($this->dbc->getLink(), "SELECT idAluno FROM Aluno
            WHERE nome = '$nome' AND nomeDaMae = '$nomeMae'");
        if ($result1) {
            $row = mysqli_fetch_array($result1);
            $idAluno = array('idAluno' => $row['idAluno']);
            return $idAluno;
        }
    }

}

?>
