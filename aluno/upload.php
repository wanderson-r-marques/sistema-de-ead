<?php
require('valida.php');
require('../helpers/enviar_arquivo.php');
if (is_numeric($_POST['prova']) && isset($_FILES['atividade'])) {
    $caminho = '../atividades/' . $_POST['prova'] . '_' . $atributo->ENTIDADE;
    $link = enviar_arquivo($_FILES['atividade'], $caminho);
    $entidade = $atributo->ENTIDADE;
    if ($link != '-1' && $link != '0') {        
        $prova = $_POST['prova'];

        $query = "INSERT INTO AC_REALIZADO_ALUNOS_ARQUIVOS (
            AC_MATERIAL_PARA_ALUNOS,
            DATA_HORA,
            ENTIDADE ,LINK)
           VALUES ('$prova',NOW(),'$entidade','$link'
           )";

        $update = " UPDATE AC_REALIZADO_ALUNOS_ARQUIVOS SET LINK = '$link'
                    WHERE ENTIDADE = $entidade AND AC_MATERIAL_PARA_ALUNOS = $prova";

        try {
            $smtp = $con->prepare($query);
            $smtp->execute();
        } catch (\Throwable $th) {
            try {
                $smtp = $con->prepare($update);
                $smtp->execute();
            } catch (\Throwable $th) {
                echo $query.'<br>'.$update;
                exit;
            }
        }

        echo 'true';
    }else{
        echo $link;
    }
}
