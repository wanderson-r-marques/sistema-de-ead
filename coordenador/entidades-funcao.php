<?php
require_once 'valida.php';
// Função para cadastrar
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['cpf']) && $_POST['cpf'] != null) {
        $nome = addslashes($_POST['nome']);
        $apelido = addslashes($_POST['apelido']);
        $cod = $_POST['cod']; 
        $cpf = $_POST['cpf'];        
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $rg = addslashes($_POST['rg']);
        $dataNascimento = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['edu-start'])));
        $telefone1 = addslashes($_POST['telefone-1']);
        $telefone2 = addslashes($_POST['telefone-2']);
        $email = addslashes($_POST['email']);
        $tipo = addslashes($_POST['tipo']);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $query = "INSERT INTO entidades (

            `NOME`,
            `NOME_FANTASIA`,
            `CPF`,
            `RG`,
            `DATA_NASCIMENTO`,
            `TELEFONE1`,
            `TELEFONE2`,
            `EMAIL`,
            `PK_TIPO_CADASTRO`,
            `COD_INEP`,
            `SENHA`
          )
          VALUES
            (
              :nome,
              :apelido,
              :cpf,
              :rg,
              :dataNascimento,
              :telefone1,
              :telefone2,
              :email,
              :tipo,
              :cod
              :senha
            );";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':nome', $nome, PDO::PARAM_STR);
        $smtp->bindParam(':apelido', $apelido, PDO::PARAM_STR);
        $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $smtp->bindParam(':rg', $rg, PDO::PARAM_STR);
        $smtp->bindParam(':dataNascimento', $dataNascimento, PDO::PARAM_STR);
        $smtp->bindParam(':telefone1', $telefone1, PDO::PARAM_STR);
        $smtp->bindParam(':telefone2', $telefone2, PDO::PARAM_STR);
        $smtp->bindParam(':email', $email, PDO::PARAM_STR);
        $smtp->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $smtp->bindParam(':cod', $cod, PDO::PARAM_INT);
        $smtp->bindParam(':senha', $senha, PDO::PARAM_STR);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Entidade cadastrada com sucesso!#success";
            header('Location: entidades.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a Entidade!#danger";
            header('Location: entidades.php');
        }
    }
}
// Função para editar
if ($_GET['funcao'] == 'editar' && is_numeric($_GET['pk'])) {
   
    if (isset($_POST['cpf']) && $_POST['cpf'] != null) {
        $nome = addslashes($_POST['nome']);
        $apelido = addslashes($_POST['apelido']);
        $cpf = $_POST['cpf'];        
        $cod = $_POST['cod'];        
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $rg = addslashes($_POST['rg']);
        $dataNascimento = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['edu-start'])));
        $telefone1 = addslashes($_POST['telefone-1']);
        $telefone2 = addslashes($_POST['telefone-2']);
        $email = addslashes($_POST['email']);
        $tipo = addslashes($_POST['tipo']);
        $senha = ($_POST['senha'] != '') ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $_POST['senhaOld'];
        $pk = addslashes($_GET['pk']);
        $query = "UPDATE
        `entidades`
        SET        
        `NOME` = '$nome',
        `NOME_FANTASIA` = '$apelido',
        `CPF` = '$cpf',
        `RG` = '$rg',
        `DATA_NASCIMENTO` = '$dataNascimento',
        `TELEFONE1` = '$telefone1',
        `TELEFONE2` = '$telefone2',
        `EMAIL` = '$email',
        `COD_INEP` = '$cod',
        `PK_TIPO_CADASTRO` = '$tipo',        
        `SENHA` = '$senha'
        WHERE `PK_ENTIDADE` = $pk;
      
      ";
        $smtp = $con->prepare($query);       
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Entidade editada com sucesso!#success";
            header('Location: entidades.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar a Entidade!#danger";
            header('Location: entidades.php');
        }
    }
}
// Função para deletar
if ($_GET['funcao'] == 'deletar' && is_numeric($_GET['pk'])) {
    $pk = addslashes($_GET['pk']);
    $query = "DELETE FROM entidades WHERE PK_ENTIDADE = :pk";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    if ($smtp->execute()) {
        session_start();
        $_SESSION['msg'] = "Entidade deletada com sucesso!#success";
        header('Location: entidades.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao deletar a Entidade!#danger";
        header('Location: entidades.php');
    }
}
