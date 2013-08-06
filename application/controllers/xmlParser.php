<?php

class XMLParser extends CI_Controller {

    //private $dbc = NULL;

    public function __construct() {
        parent::__construct();
        require_once 'application/controllers/aluno.php';
        require_once 'application/controllers/avaliacao.php';

        $this->load->model('DBConnection', 'dbc');
    }

    public function parse($xmlFile) {
        $doc = new DOMDocument();
        $alunoCon = new Aluno();
        $doc->load('application/uploads/' . $xmlFile);
        $CI = $this->get_instance();

        $prodown = $doc->getElementsByTagName("prodown_envio");
        $turma = $prodown->item(0)->getElementsByTagName("alunos");
        $alunos = $turma->item(0)->getElementsByTagName("aluno");
        $dadosAluno = array();
        foreach ($alunos as $aluno) {
            $nome = $aluno->getElementsByTagName("nome")->item(0)->nodeValue;

            $aniversario = $aluno->getElementsByTagName("nascimento")->item(0)->nodeValue;

            $genero = $aluno->getElementsByTagName("genero")->item(0)->nodeValue;

            $endereco = $aluno->getElementsByTagName("endereco")->item(0)->nodeValue;

            //$cidade = $aluno->getElementsByTagName("cidade")->item(0)->nodeValue;

            $nomeMae = $aluno->getElementsByTagName("nome_mae")->item(0)->nodeValue;

            $nomePai = $aluno->getElementsByTagName("nome_pai")->item(0)->nodeValue;

            $telefone = $aluno->getElementsByTagName("telefone")->item(0)->nodeValue;

            $celular = $aluno->getElementsByTagName("celular")->item(0)->nodeValue;

            $email = $aluno->getElementsByTagName("email")->item(0)->nodeValue;

            $temp = $this->session->userdata('loggedUser');
            $cpfProfessor = $temp['username'];
            
            $temp2 = mysqli_query($this->dbc->getLink(), "SELECT Escola_idEscola FROM Escola_Professor WHERE Professor_cpf = $cpfProfessor");
            
            $escolaID = mysqli_fetch_array($temp2);
            $escolaID = $escolaID['Escola_idEscola'];

            /*$idAluno = mysqli_fetch_array(mysqli_query($this->dbc->getLink(), "SELECT MAX(idAluno) FROM Aluno"))['MAX(idAluno)'];
            //$idAluno += 1;

            if ($idAluno == NULL) {
                $idAluno = 0;
            } else {
                $idAluno += 1;
            }*/

            $dadosAluno = array('idAluno' => 'NULL', 'idEscola' => $escolaID, 'cpfProfessor' => $cpfProfessor, 'nome' => $nome,
                'nasc' => $aniversario, 'genero' => $genero, 'endereco' => $endereco, 'nome_mae' => $nomeMae, 'nome_pai' => $nomePai,
                'telefone' => $telefone, 'celular' => $celular, 'email' => $email);

            $ret = $alunoCon->addAluno($dadosAluno);
            $idAluno = 0;
            if (isset($ret['idAluno'])) {
                $idAluno = $ret['idAluno'];
            }
            if (isset($ret['error'])) {
                echo $ret['error'];
            }



            //$dataAvaliaca
            $avaliacaoCon = new Avaliacao();
            $avaliacoes = $aluno->getElementsByTagName("avaliacao");
            foreach ($avaliacoes as $avaliacao) {
                $data = $avaliacao->getElementsByTagName("data")->item(0)->nodeValue;
                $horario = $avaliacao->getElementsByTagName("horario")->item(0)->nodeValue;
                $temperatura = $avaliacao->getElementsByTagName("temperatura")->item(0)->nodeValue;
                $massa_corporal = $avaliacao->getElementsByTagName("massa_corporal")->item(0)->nodeValue;
                $estatura = $avaliacao->getElementsByTagName("estatura")->item(0)->nodeValue;
                $imc = $avaliacao->getElementsByTagName("imc")->item(0)->nodeValue;
                $envergadura = $avaliacao->getElementsByTagName("envergadura")->item(0)->nodeValue;
                $abdominal = $avaliacao->getElementsByTagName("abdominal")->item(0)->nodeValue;
                $sentar_alcancar = $avaliacao->getElementsByTagName("sentar_e_alcancar")->item(0)->nodeValue;
                $sentar_alcancar_banco = $avaliacao->getElementsByTagName("banco")->item(0)->nodeValue;
                $seis_minutos = $avaliacao->getElementsByTagName("seis_minutos")->item(0)->nodeValue;
                $nove_minutos = $avaliacao->getElementsByTagName("nove_minutos")->item(0)->nodeValue;
                $salto_horizontal = $avaliacao->getElementsByTagName("salto_horizontal")->item(0)->nodeValue;
                $arremesso_bola = $avaliacao->getElementsByTagName("arremesso_medicineball")->item(0)->nodeValue;
                $quadrado = $avaliacao->getElementsByTagName("quadrado")->item(0)->nodeValue;
                $corrida = $avaliacao->getElementsByTagName("corrida")->item(0)->nodeValue;

                $temp2 = mysqli_fetch_array(mysqli_query($this->dbc->getLink(), "SELECT MAX(numAvaliacao) FROM Avaliacao WHERE Aluno_idAluno = $idAluno"));
                $idAvaliacao = $temp2['MAX(numAvaliacao)'];
                
                if ($idAvaliacao == NULL) {
                    $idAvaliacao = 0;
                } else {
                    $idAvaliacao += 1;
                }

                $dadosAvaliacao = array('Aluno_idAluno' => $idAluno, 'idAvaliacao' => $idAvaliacao,
                    'data' => $data, 'horario' => $horario, 'temperatura' => $temperatura,
                    'massa_corporal' => $massa_corporal, 'estatura' => $estatura, 'imc' => $imc, 'envergadura' => $envergadura,
                    'abdominal' => $abdominal, 'sentar_alcancar' => $sentar_alcancar,'sentar_alcancar_banco'=>$sentar_alcancar_banco,
                    'seis_minutos' => $seis_minutos,'nove_minutos' => $nove_minutos, 'salto_horizontal' => $salto_horizontal, 
                    'arremesso_bola' => $arremesso_bola, 'quadrado' => $quadrado, 'corrida' => $corrida);

                $ret = $avaliacaoCon->addAvaliacao($dadosAvaliacao);
                if (isset($ret['error'])) {
                    echo $ret['error'];
                }
            }

            //$temp = array($aluno->nodeName => $aluno->nodeValue);
            //array_push($data,$temp);
        }

        return true;
    }

}

?>
