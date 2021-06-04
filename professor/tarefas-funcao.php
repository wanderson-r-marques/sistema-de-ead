<?php
require_once 'valida.php';
require_once 'tarefas-funcao-arquivo.php';
require_once '../helpers/ano-letivo.php';
// Função para colocar os alunos na sessão
if ($_GET['funcao'] == 'alunos') {
    if (count($_POST['turmas'])) {
        $turmas = implode(',', $_POST['turmas']);
        $descricao = $_POST['descricao'];
        $data_hora = date('Y-m-d H:i:s');

        try {
            $query = "INSERT INTO `cadastro_tarefas` (
                `DESCRICAO_GERAL`,
                `DATA_HORA`
              )
              VALUES
                (   
                  :descricao,
                  :data_hora
                )";
            $smtp = $con->prepare($query);
            $smtp->bindParam(':descricao', $descricao);
            $smtp->bindParam(':data_hora', $data_hora);
            $smtp->execute();
            $id = $con->lastInsertId();
        } catch (PDOException $th) {
            $th->getMessage();
            die;
        }
        // Envia todos os links e arquivos
        tarefas_cadastrar($id, $_FILES['arquivo'] ?? '', $_POST['link'] ?? '', $_POST['tipo'], $con);

        // Insere todos os alunos
        $query = "SELECT d.`PK_ENTIDADE`,
        d.`NOME` AS NOME_PROFESSOR,
        d.`PK_TIPO_CADASTRO`,
        a.`PK_SERIES`,
        a.`DESCRICAO` AS serie,
        b.`pk_turma`,
        b.`DESCRICAO` AS turma,
        b.`PK_ESCOLA`,
        e.`DESCRICAO` AS escola,
        f.`PK_ALUNOS_ESCOLAS_TURMAS`,
        f.`PK_ENTIDADE`,
        g.`NOME` AS nome_aluno
        
        FROM series 			  a
        JOIN turmas 			  b ON a.`PK_SERIES` = b.`PK_SERIE`
        JOIN professor_turmas_disciplinas c ON b.`PK_TURMA` = c.`pk_turma` AND b.`PK_ESCOLA` = c.`pk_escola`
        JOIN entidades			  d ON c.`pk_entidade` = d.pk_entidade
        JOIN escolas                      e ON b.`PK_ESCOLA` = e.`PK_ESCOLA`
        JOIN alunos_escolas_turmas        f ON b.`PK_TURMA` = f.`PK_TURMA`
        JOIN entidades	                  g ON f.`PK_ENTIDADE` = g.`PK_ENTIDADE`
        WHERE b.`pk_turma` IN ($turmas)
        AND d.`CPF`=  '$cpf'";

        $smtp = $con->prepare($query);
        // $smtp->bindParam(':cpf', $cpf);
        $smtp->execute();

        $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);

        foreach ($linhas as $linha) {

            $PK_ALUNO = $linha->PK_ENTIDADE;
            $PK_CADASTRO_TAREFAS = $id;
            $PK_ALUNO_ESCOLA_TURMA = $linha->PK_ALUNOS_ESCOLAS_TURMAS;
            $ANO = ano_letivo($con);

            try {
                $query = "INSERT INTO `alunos_material` (  
                    `PK_ALUNO`,
                    `PK_CADASTRO_TAREFAS`,
                    `PK_ALUNO_ESCOLA_TURMA`,
                    `ANO`,
                    `DATA_HORA`
                  )
                  VALUES
                    (                 
                      :PK_ALUNO,
                      :PK_CADASTRO_TAREFAS,
                      :PK_ALUNO_ESCOLA_TURMA,
                      :ANO,
                      :DATA_HORA
                    )";
                $smtp = $con->prepare($query);
                $smtp->bindParam(':PK_ALUNO', $PK_ALUNO);
                $smtp->bindParam(':PK_CADASTRO_TAREFAS', $PK_CADASTRO_TAREFAS);
                $smtp->bindParam(':PK_ALUNO_ESCOLA_TURMA', $PK_ALUNO_ESCOLA_TURMA);
                $smtp->bindParam(':ANO', $ANO);
                $smtp->bindParam(':DATA_HORA', $data_hora);
                $smtp->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        session_start();
        $_SESSION['msg'] = "O material foi cadastrado com sucesso!!#success";
        header('Location: tarefas.php');
    } else {
        echo 'precisa selecionar uma turma';
    }
}
