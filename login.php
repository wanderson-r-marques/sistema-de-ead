<?php
if ($_POST['acessar'] == 's' && $_POST['token'] == '8s0dfg7s6grogpsfgsgs-*sgsfg') {

    if ($_POST['cpf'] != '' && $_POST['senha'] != '') {

        require_once "config.php";
        $con = conectar();

        $cpf = $_POST['cpf'];
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $senha = $_POST['senha'];
        $ipPc = $_SERVER["REMOTE_ADDR"];

        $query = "SELECT
    `NOME`,
    `NOME_FANTASIA`,
    `CPF`,
    `RG`,
    `DATA_NASCIMENTO`,
    `TELEFONE1`,
    `TELEFONE2`,
    `EMAIL`,
    `PK_TIPO_CADASTRO`,
    `MATRICULA`,
    `SENHA`,
    `COD_INEP`
  FROM
    `entidades`
  WHERE
     CPF = :cpf AND SENHA = :senha";

        $smtp = $con->prepare($query);
        $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $smtp->bindParam(':senha', $senha, PDO::PARAM_STR);

        if ($smtp->execute()) {
            if ($smtp->rowCount() > 0) {
                $linha = $smtp->fetch(PDO::FETCH_OBJ);                
                $_SESSION['cpf'] = $cpf;

                if($linha->PK_TIPO_CADASTRO == 2)
                    header('Location: professor/painel.php');
                else
                    header('Location: aluno/painel.php');

                exit;
            } else {
                session_start();
                $_SESSION['msg'] = "Não tem usuário cadastrado com essas credenciais!#danger";
                header('Location: index.php');
            }
        }
    } else {
        session_start();
        $_SESSION['msg'] = "Você precisa preencher todos os campos!#danger";
        header('Location: index.php');
    }

}
