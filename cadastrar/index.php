<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

if (isset($_POST) && $_POST['token'] == '43534gfgfg7f6g-*uyddhgjg') {
    // Pegando valores do formulário
    $cpf                    = $_POST['cpf'];
    $nome                   = $_POST['nome'];
    $rg                     = $_POST['rg'];
    $orgao_expeditor        = $_POST['orgao_expeditor'];
    $uf_rg                  = $_POST['uf_rg'];
    $data_nascimento        = $_POST['data_nascimento'];
    $data_nascimento        = str_replace('/', '-', $data_nascimento);
    $data_nascimento        = date('Y-m-d', strtotime($data_nascimento));
    $sexo                   = $_POST['sexo'];
    $cep                    = $_POST['cep'];
    $logradouro             = $_POST['logradouro'];
    $cidade                 = $_POST['cidade'];
    $bairro                 = $_POST['bairro'];
    $uf                     = $_POST['estado'];
    $telefone_residencial   = $_POST['telefone_residencial'];
    $celular                = $_POST['celular'];
    $profissao              = $_POST['profissao'];
    $n_carteira_classe      = $_POST['n_carteira_classe'];
    $pis_pasep              = $_POST['pis_pasep'];
    $email                  = $_POST['email'];    
    $vaga_saude_educacao    = $_POST['segmento'];
    $portador_deficiencia   = $_POST['portador_deficiencia'];
    $qual_deficiencia       = $_POST['qual_deficiencia'];
    $cargo_educacao         = $_POST['cargo_educacao'];
    $cargo_saude            = $_POST['cargo_saude'];
    $numero                 = $_POST['numero'];
    $complemento            = $_POST['complemento'];

    // Criando a query para inserir os dados
    $query = "INSERT INTO `Candidatos`(`cpf`, `nome`, `rg`, `orgao_expeditor`, `uf_rg`, `data_nascimento`, `sexo`, `cep`, `logradouro`, `cidade`, `bairro`, `uf`, `telefone_residencial`, `celular`, `profissao`, `n_carteira_classe`, `pis_pasep`, `email`, `vaga_saude_educacao`, `portador_deficiencia`, `qual_deficiencia`, `cargo_educacao`, `cargo_saude`, `numero`, `complemento`) VALUES 
    ('$cpf', '$nome', '$rg', '$orgao_expeditor', '$uf_rg', '$data_nascimento', '$sexo', '$cep', '$logradouro', '$cidade', '$bairro', '$uf', '$telefone_residencial', '$celular', '$profissao', '$n_carteira_classe', '$pis_pasep', '$email', '$vaga_saude_educacao', '$portador_deficiencia', '$qual_deficiencia', '$cargo_educacao', '$cargo_saude', '$numero', '$complemento' )";

    try {
        // Conectando o banco
        require_once("../restrito/conexao.php");
        $con = conectar();
        // Preparando a query
        $smtp = $con->prepare($query);

        // Executando a query        
        if ($smtp->execute()) {

            // Pega o PK do registro
            $pk = $con->lastInsertId();

            

            // Pegar dados para enviar por email
            $query = "SELECT a.candidado,  a.nome,
            a.cpf,   b.modalidade as descricao,
            b.entrevista,    b.pratica
            
          
     FROM Candidatos a 
     LEFT JOIN cargo_educacao b on a.cargo_educacao = b.cargo_educacao 
     where a.candidado=$pk
     and a.cargo_educacao <>0
     
     union
     
     SELECT a.candidado,
            a.nome,
            a.cpf,
     
            CONCAT(c.quadro,' - ',c.local,' - ',c.cargo) as descricao,
     
     c.entrevista,c.pratica
     FROM Candidatos a 
     LEFT JOIN cargo_saude c on a.cargo_saude = c.cargo_saude
     where a.candidado=$pk
     and a.cargo_saude <>0";
            $smtp = $con->prepare($query);
            $smtp->execute();

            $atributo = $smtp->fetch(PDO::FETCH_OBJ);

            $nomeEmail = $atributo->nome;
            $cargoEmail = $atributo->descricao;
         

            // Enviar e-mail para o candidato
            require '../phpmailer/PHPMailerAutoload.php';
            require '../helpers/email.php';

            email($email,$nomeEmail,$cargoEmail);
           
            session_start();
            $_SESSION['confirmado'] = true;
            header('Location: ../confirmacao.php');
            exit;
            
        }
    } catch (PDOException $e) {
        $msgErro = $e->getMessage();
        if (strstr($msgErro, '1062', true)) { // Duplicidade 
            header('Location: ../consultar/');
            exit;
        } else {
            echo 'Entre em contato com a equipe da Famasul';
            echo 'Erro: ' . $msgErro;
        }
    }
}else{
    header('Location: ../');
}
