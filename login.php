<?php
if ($_POST['acessar'] == 's' && $_POST['token'] == '8s0dfg7s6grogpsfgsgs-*sgsfg') {

    if ($_POST['cpf'] != '' && $_POST['senha'] != '') {

        // Guardar senha no Coock
        if ($_POST['lembrar'] == 1) {
            setcookie("loginEAD", $_POST['cpf'], time() + (86400 * 36000));
            setcookie("senhaEAD", $_POST['senha'], time() + (86400 * 36000));
        } else {
            setcookie("loginEAD", "", time() - 3600);
            setcookie("senhaEAD", "", time() - 3600);
        }

        require_once "config.php";
        $con = conectar();

        $cpf = $_POST['cpf'];
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $senha = $_POST['senha'];
        $ipPc = $_SERVER["REMOTE_ADDR"];

        $query = "SELECT
                        `PK_ENTIDADE`,
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
                        CPF = :cpf";

        $smtp = $con->prepare($query);
        $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);

        if ($smtp->execute()) {
            if ($smtp->rowCount() > 0) {
                $linha = $smtp->fetch(PDO::FETCH_OBJ);

                //  Atualiza a senha para criptografia
                $senhaHash = '';
                if ($senha == $linha->SENHA) {
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    $query = "UPDATE entidades SET SENHA = :senha WHERE CPF = :cpf";
                    $smtp = $con->prepare($query);
                    $smtp->bindParam(':senha', $senhaHash, PDO::PARAM_STR);
                    $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                    $smtp->execute();
                }

                if (password_verify($senha, $linha->SENHA) || password_verify($senha, $senhaHash)) {
                    session_start();
                    $_SESSION['cpf'] = $cpf;
                    $_SESSION['entidade'] = $linha->PK_ENTIDADE;

                    if ($linha->PK_TIPO_CADASTRO == 2) {
                        header('Location: professor/painel.php');
                    } else if ($linha->PK_TIPO_CADASTRO == 4) {
                        header('Location: restrito/painel.php');
                    } else if ($linha->PK_TIPO_CADASTRO == 1) {
                        header('Location: aluno/painel.php');
                    }
                } else {
                    session_start();
                    $_SESSION['msg'] = "Sua senha está incorreta!#danger";
                    header('Location: index.php');
                }
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
