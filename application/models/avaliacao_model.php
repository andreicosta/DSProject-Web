<?php

class Avaliacao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('DBConnection', 'dbc');
    }

    public function do_addAvaliacao($dados) {
        $idAluno = $dados['Aluno_idAluno'];
        $idAvaliacao = $dados['idAvaliacao'];
        $data = $dados['data'];
        $horario = $dados['horario'];
        $temperatura = $dados['temperatura'];
        $massa_corporal = $dados['massa_corporal'];
        $estatura = $dados['estatura'];
        $imc = $dados['imc'];
        $envergadura = $dados['envergadura'];
        $abdominal = $dados['abdominal'];
        $sentar_alcancar = $dados['sentar_alcancar'];
        $seis_minutos = $dados['seis_minutos'];
        $nove_minutos = $dados['nove_minutos'];
        $salto_horizontal = $dados['salto_horizontal'];
        $arremesso_bola = $dados['arremesso_bola'];
        $quadrado = $dados['quadrado'];
        $corrida = $dados['corrida'];
        $banco = $dados['sentar_alcancar_banco'];
        $class_sentar = $dados['classificacaoSentarEAlcancar'];
        $class_abdominal = $dados['classificacaoAbdominal'];
        $class_arremesso_bola = $dados['classificacaoArremessoMedicineBall'];
        $class_corrida = $dados['classificacaoCorrida20Metros'];
        $class_salto = $dados['classificacaoSaltoHorizontal'];
        $class_quadrado = $dados['classificacaoTesteDoQuadrado'];
               

        $sentar_alcancar_banco = 0;

        if ($banco == 'true') {
            $sentar_alcancar_banco = $sentar_alcancar;
            $sentar_alcancar = 0;
        }

        $result1 = mysqli_query($this->dbc->getLink(), "SELECT numAvaliacao FROM Avaliacao 
            WHERE Aluno_idAluno = $idAluno AND data = '$data' AND horario = '$horario'");
        if ($result1) {
            $row = mysqli_fetch_array($result1);
            if ($row[0] != NULL) {
                $error = array('error' => 'Avaliacao ja existente no banco de dados <br>', 'idAvaliacao' => $row['numAvaliacao']);
                //return $error;
            }
        } else {
            $error = array('error' => "Erro no select Avaliacao <br>");
            //return $error;
        }
        
        $result = mysqli_query($this->dbc->getLink(), "INSERT INTO Avaliacao(Aluno_idAluno, numAvaliacao, data,
                horario, temperatura, massaCorporal, estatura, imc,
                envergadura, sentarEAlcancar, sentarEAlcancarComBanco, 
                abdominal, _9Minutos, _6Minutos, saltoHorizontal, 
                arremessoMedicineBall, testeDoQuadrado, corrida20Metros, classificacaoSentarEAlcancar,
                classificacaoAbdominal, classificacaoArremessoMedicineBall,classificacaoCorrida20Metros,
                classificacaoSaltoHorizontal, classificacaoTesteDoQuadrado)
                VALUES ($idAluno,$idAvaliacao,'$data','$horario',$temperatura,$massa_corporal,
                    $estatura,$imc,$envergadura,$sentar_alcancar,0,$abdominal,$nove_minutos,$seis_minutos,
                    $salto_horizontal,$arremesso_bola,$quadrado,$corrida,'$class_sentar', '$class_abdominal',
                    '$class_arremesso_bola', '$class_corrida', '$class_salto', '$class_quadrado')");


        if (!$result) {
            $error = array('error' => 'Erro ao inserir no banco de dados Prodown Avaliacao <br>');
            //return $error;
        }
        return true;
    }

}

?>
