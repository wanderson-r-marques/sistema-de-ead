<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
//Definir formato de arquivo
header('Content-Type:' . "text/plain");
require_once('valida.php');

// Função para pegar os dados do candidato
if ($_POST['funcao'] === 'dados') {
    $pk = $_POST['pk'];

    $query = "SELECT *
    from (SELECT a.nome,
       LPAD(CAST(a.candidado AS CHAR),6,'0') as inscricao,
       a.cpf,
       a.rg,
       a.data_nascimento,
       a.vaga_saude_educacao,
       CONCAT(b.modalidade, ' ',b.local) as modalidade,
       a.inscricao_confirmada,
       a.isento,
       b.valor,
       a.doc_deposito,
       a.doc_rg,
       a.doc_cpf,
       a.doc_diploma,
       a.doc_carteira,
       a.doc_certidao,
       a.doc_residencia,
       a.data_deposito,
       a.valor_deposito
       
       
    FROM `Candidatos` a
    JOIN cargo_educacao b on a.cargo_educacao=b.cargo_educacao
                     
    union 
    
    SELECT a.nome,
       LPAD(CAST(a.candidado AS CHAR),6,'0') as inscricao,
       a.cpf,
       a.rg,
       a.data_nascimento,
       a.vaga_saude_educacao,
       CONCAT(c.quadro,' - ',c.local,' - ',c.cargo) as modalidade,
       a.inscricao_confirmada,
       a.isento,
       c.valor,
       a.doc_deposito,
       a.doc_rg,
       a.doc_cpf,
       a.doc_diploma,
       a.doc_carteira,
       a.doc_certidao,
       a.doc_residencia,
       a.data_deposito,
       a.valor_deposito
       
           
    FROM `Candidatos` a
    JOIN cargo_saude c on a.cargo_saude=c.cargo_saude) as g 
    where g.inscricao = $pk";

    $smtp = $con->prepare($query);
    $smtp->execute();
    $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);

    foreach ($linhas as $key => $value) {
        $dados[$key] = $value;
    }
    echo json_encode($dados);
}

// Função para editar a isenção
if ($_POST['funcao'] === 'isencao') {
    $pk = $_POST['pk'];
    $isento = $_POST['isento'];

    $query = "UPDATE `Candidatos` SET isento = $isento WHERE `candidado` = $pk";

    $smtp = $con->prepare($query);
    $smtp->execute();    
}

// Função para editar a isenção
if ($_POST['funcao'] === 'deletar_doc') {
    $pk = $_POST['pk'];
    $tabela = $_POST['tabela'];
    $arquivo = $_POST['arquivo'];
    
    $query = "UPDATE `Candidatos` SET ".$tabela." = '' WHERE `candidado` = $pk";
    
    $smtp = $con->prepare($query);
    
    if($smtp->execute()){
        unlink($arquivo);
        echo json_encode('true');
    }   else{
        echo json_encode('false');
    }
}

// Função para confirmar inscrição
if ($_POST['funcao'] === 'confirmar') {
    
    $pk = $_POST['pk'];
    
    $valor_pag = $_POST['valor_pag'];
    $valor_pag = str_replace('.','',$valor_pag);
    $valor_pag = str_replace(',','.',$valor_pag);
    $data_pag = $_POST['data_pag'];
    //$data_pag = str_replace('/','-',$data_pag);
    //$data_pag = date('Y-m-d',strtotime($data_pag));
    
    $query = "UPDATE `Candidatos` SET inscricao_confirmada = 'Confirmada', data_deposito = '$data_pag', valor_deposito = '$valor_pag'  WHERE `candidado` = $pk";
   
    $smtp = $con->prepare($query);
    
    if($smtp->execute()){
        unlink($arquivo);
        echo json_encode('true');
    }   else{
        echo json_encode('false');
    }
}


// Função para confirmar inscrição
if ($_POST['funcao'] === 'anular') {
    
    $pk = $_POST['pk'];    
    
    
    $query = "UPDATE `Candidatos` SET inscricao_confirmada = 'Anulada'  WHERE `candidado` = $pk";
   
    $smtp = $con->prepare($query);
    
    if($smtp->execute()){
        unlink($arquivo);
        echo json_encode('true');
    }   else{
        echo json_encode('false');
    }
}

