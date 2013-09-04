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
                $class_abdominal = $this->genClassificacao($genero, $aniversario, 'abdominal', $abdominal);
                $sentar_alcancar = $avaliacao->getElementsByTagName("sentar_e_alcancar")->item(0)->nodeValue;
                $sentar_alcancar_banco = $avaliacao->getElementsByTagName("banco")->item(0)->nodeValue;
                $class_sentar_alcancar = 'Ruim';
                if (!$sentar_alcancar_banco){
                    $class_sentar_alcancar = $this->genClassificacao($genero, $aniversario, 'sentar_e_alcancar', $sentar_alcancar);
                }
                $seis_minutos = $avaliacao->getElementsByTagName("seis_minutos")->item(0)->nodeValue;
                $nove_minutos = $avaliacao->getElementsByTagName("nove_minutos")->item(0)->nodeValue;
                $salto_horizontal = $avaliacao->getElementsByTagName("salto_horizontal")->item(0)->nodeValue;
                $arremesso_bola = $avaliacao->getElementsByTagName("arremesso_medicineball")->item(0)->nodeValue;
                $class_salto = $this->genClassificacao($genero, $aniversario, 'salto', $salto_horizontal);
                $class_arremesso_bola = $this->genClassificacao($genero, $aniversario, 'arremesso_medicineball', $arremesso_bola);
                $quadrado = $avaliacao->getElementsByTagName("quadrado")->item(0)->nodeValue;
                $class_quadrado = $this->genClassificacao($genero, $aniversario, 'quadrado', $quadrado);
                $corrida = $avaliacao->getElementsByTagName("corrida")->item(0)->nodeValue;
                $class_corrida = $this->genClassificacao($genero, $aniversario, 'corrida', $corrida);

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
                    'arremesso_bola' => $arremesso_bola, 'quadrado' => $quadrado, 'corrida' => $corrida,
                    'classificacaoSentarEAlcancar' => $class_sentar_alcancar,
                    'classificacaoAbdominal' => $class_abdominal, 'classificacaoArremessoMedicineBall' => $class_arremesso_bola,
                    'classificacaoCorrida20Metros' => $class_corrida, 'classificacaoSaltoHorizontal' => $class_salto,
                    'classificacaoTesteDoQuadrado' => $class_quadrado);

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
    
    public function genClassificacao($genero, $idade, $teste, $valor) {
        //echo  $idade -> diff(new DateTime('YYYY-MM-DD')) -> y, 'years';
                
        $tab_masc_abdominal = array(array(8, 11, 14, 17), //10
                                    array(9, 12, 15, 18), //11
                                    array(10, 12, 16, 19),//12
                                    array(11, 13, 16, 19),//13
                                    array(11,14,17,20),//14
                                    array(11,14,17,22),//15
                                    array(12,15,18,22),//16
                                    array(12,15,18,22),//17
                                    array(12,15,18,21),//18
                                    array(12,15,17,22),//19
                                    array(12,15,17,22));//20
        
        $tab_femi_abdominal = array(array(5, 9, 13, 15), //10
                                    array(6, 9, 13, 15), //11
                                    array(6, 9, 13, 16),//12
                                    array(6, 9, 13, 16),//13
                                    array(7, 10,13, 16),//14
                                    array(8, 11,14, 17),//15
                                    array(9, 12,15, 19),//16
                                    array(10,12,14, 17),//17
                                    array(9,12,15, 17),//18
                                    array(9,12,14,17),//19
                                    array(9,11,14,16));//20
        
        $tab_masc_sentar =    array(array(28, 34, 38, 42), //10
                                    array(29, 35, 38, 46), //11
                                    array(30, 38, 45, 49),//12
                                    array(32, 38, 43, 52),//13
                                    array(33,43,47,54),//14
                                    array(33,40,48,56),//15
                                    array(38,45,52,56),//16
                                    array(38,47,52,57),//17
                                    array(37,43,47,57),//18
                                    array(38,45,49,57),//19
                                    array(38,45,50,57));//20
        
        $tab_femi_sentar =    array(array(31, 36, 39, 42), //10
                                    array(31, 36, 40, 44), //11
                                    array(31, 40, 43, 48),//12
                                    array(35, 41, 45, 52),//13
                                    array(38, 42, 45, 55),//14
                                    array(38, 43, 46, 56),//15
                                    array(39, 46, 50, 57),//16
                                    array(45, 51, 53, 57),//17
                                    array(37, 49, 53, 57),//18
                                    array(38,50, 55, 57),//19
                                    array(38,50, 54, 57));//20
        
        $tab_masc_arremesso = array(array(90,  115, 122, 176), //10
                                    array(115, 140, 150, 178), //11
                                    array(116, 142, 170, 189),//12
                                    array(119, 148, 170, 226),//13
                                    array(144, 143, 192, 234),//14
                                    array(161, 212, 245, 292),//15
                                    array(167, 178, 247, 312),//16
                                    array(185, 231, 245, 313),//17
                                    array(186, 237, 260, 315),//18
                                    array(160, 210, 263, 318),//19
                                    array(168, 192, 270, 321));//20
        
        
        $tab_femi_arremesso = array(array(87,  94,  107, 117), //10
                                    array(89,  96,  108, 130), //11
                                    array(90,  118, 131, 149),//12
                                    array(98,  126, 156, 179),//13
                                    array(107, 137, 169, 188),//14
                                    array(112, 144, 179, 192),//15
                                    array(123, 167, 220, 235),//16
                                    array(130, 186, 225, 239),//17
                                    array(156, 190, 215, 257),//18
                                    array(160, 166, 208, 244),//19
                                    array(158, 171, 212, 258));//20
        
        $tab_masc_corrida   = array(array(8.40, 7.40, 6.80, 5.62), //10
                                    array(8.22, 7.38, 6.70, 5.44), //11
                                    array(8.13, 7.11, 6.54, 5.01),//12
                                    array(7.91, 6.99, 6.11, 4.96),//13
                                    array(7.82, 6.51, 5.81, 4.53),//14
                                    array(7.64, 6.31, 5.79, 4.41),//15
                                    array(7.41, 6.00, 5.44, 4.33),//16
                                    array(7.22, 5.82, 5.21, 4.11),//17
                                    array(7.12, 5.66, 4.99, 4.10),//18
                                    array(7.13, 5.64, 4.80, 4.07),//19
                                    array(7.20, 5.62, 4.76, 4.07));//20
        
        
        $tab_femi_corrida =   array(array(7.84, 7.78, 6.72, 6.71), //10
                                    array(7.70, 7.55, 6.05, 6.04), //11
                                    array(7.32, 6.24, 5.81, 5.80),//12
                                    array(7.26, 6.10, 5.73, 5.72),//13
                                    array(7.18, 6.00, 5.61, 5.60),//14
                                    array(7.14, 5.84, 5.11, 5.10),//15
                                    array(7.08, 5.80, 5.06, 5.05),//16
                                    array(7.12, 5.88, 5.24, 5.23),//17
                                    array(7.25, 5.94, 5.29, 5.30),//18
                                    array(7.10, 5.78, 5.22, 5.21),//19
                                    array(7.09, 5.76, 5.19, 5.18));//20
        
        $tab_masc_salto  =    array(array(38, 49, 60, 83), //10
                                    array(43, 54, 70, 86), //11
                                    array(50, 61, 71, 86),//12
                                    array(52, 62, 70, 99),//13
                                    array(54, 68, 90, 105),//14
                                    array(55, 78, 90, 111),//15
                                    array(55, 78, 92, 115),//16
                                    array(56, 80, 97, 118),//17
                                    array(55, 82,101, 120),//18
                                    array(54, 81,101, 125),//19
                                    array(55, 78,100, 135));//20
        
        $tab_femi_salto =     array(array(34, 43, 59, 66), //10
                                    array(40, 52, 60, 68), //11
                                    array(42, 55, 65, 70),//12
                                    array(46, 57, 67, 75),//13
                                    array(50, 59, 69, 78),//14
                                    array(52, 60, 74, 82),//15
                                    array(56, 64, 76, 93),//16
                                    array(56, 65, 76, 97),//17
                                    array(52, 60, 74, 97),//18
                                    array(54, 64, 76, 98),//19
                                    array(54, 66, 75, 95));//20
        
        $tab_masc_quad  =     array(array(12.49, 11.43, 10.34, 9.86), //10
                                    array(12.39, 11.38, 9.94,  9.76), //11
                                    array(12.37, 11.28, 9.76,  8.98),//12
                                    array(11.90, 11.02, 9.60,  8.43),//13
                                    array(11.35, 10.90, 8.61,  7.24),//14
                                    array(11.20, 10.35, 8.60,  7.15),//15
                                    array(11.01, 10.68, 8.43,  7.05),//16
                                    array(10.80, 10.26, 8.36,  7.12),//17
                                    array(11.24, 10.45, 9.01,  7.98),//18
                                    array(11.12, 10.40, 8.92,  7.80),//19
                                    array(10.90, 10.36, 9.59,  8.14));//20
        
        $tab_femi_quad =      array(array(12.87, 12.06, 11.70, 10.82), //10
                                    array(12.66, 12.01, 11.58, 10.30), //11
                                    array(12.12, 12.00, 11.38, 10.02),//12
                                    array(11.93, 11.80, 11.18, 9.78),//13
                                    array(11.40, 11.14, 11.02, 9.72),//14
                                    array(11.10, 10.94, 10.69, 9.61),//15
                                    array(10.97, 10.77, 10.43, 9.55),//16
                                    array(10.88, 10.68, 10.28, 9.11),//17
                                    array(10.87, 10.65, 10.19, 9.19),//18
                                    array(11.02, 10.80, 10.15, 9.28),//19
                                    array(10.90, 10.71, 10.09, 9.14));//20
        
        
        $tabs= array(array($tab_masc_abdominal, $tab_femi_abdominal),
                        array($tab_masc_sentar, $tab_femi_sentar),
                        array($tab_masc_arremesso, $tab_femi_arremesso),
                        array($tab_masc_corrida, $tab_femi_corrida),
                        array($tab_masc_salto, $tab_femi_salto),
                        array($tab_masc_quad, $tab_femi_quad));
        
        $g = array ('Masculino ' => 0,
                    'Feminino ' => 1);
        
        $t = array ('abdominal' => 0, 
                    'sentar_e_alcancar' => 1, 
                    'arremesso_medicineball' => 2, 
                    'corrida' => 3,
                    'salto' => 4,
                    'quadrado' => 5);
        
        $s = array ('abdominal' => 0, 
                    'sentar_e_alcancar' => 0, 
                    'arremesso_medicineball' => 0, 
                    'corrida' => 1,
                    'salto' => 0,
                    'quadrado' => 1);
        
        $i = array ('10' => 0,
                    '11' => 1,
                    '12' => 2,
                    '13' => 3,
                    '14' => 4,
                    '15' => 5,
                    '16' => 6,
                    '17' => 7,
                    '18' => 8,
                    '19' => 9,
                    '20' => 10);
        
        $t_g = $g[$genero];
        $t_t = $t[$teste];
        //$t_i = $i[$idade];
        
        
        $class = 'Otimo';
        if ($s[$teste] == 0){
            if ($valor <= $tabs[$t_t][$t_g][0][0]){
                $class = 'Fraco';
            }
            elseif ($valor <= $tabs[$t_t][$t_g][0][1]){
                $class = 'Razoavel';
            }
            elseif ($valor <= $tabs[$t_t][$t_g][0][2]){
                $class = 'Bom';
            }
            elseif ($valor <= $tabs[$t_t][$t_g][0][3]){
                $class = 'Muito Bom';
            }
        }
        else{
            if ($valor >= $tabs[$t_t][$t_g][0][0]){
                $class = 'Fraco';
            }
            elseif ($valor >= $tabs[$t_t][$t_g][0][1]){
                $class = 'Razoavel';
            }
            elseif ($valor >= $tabs[$t_t][$t_g][0][2]){
                $class = 'Bom';
            }
            elseif ($valor >= $tabs[$t_t][$t_g][0][3]){
                $class = 'Muito Bom';
            }
        }
        
        return $class;
        
    }

}

?>