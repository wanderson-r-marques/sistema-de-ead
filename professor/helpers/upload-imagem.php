<?php
session_start();
require_once '../../config.php';
if (isset($_SESSION['cpf']) && $_SESSION['cpf'] != '') // Verificaa se tem login
{  
    $cpf = $_SESSION['cpf'];
    if (isset($_FILES['foto'])) {
        $ext = strtolower(substr($_FILES['foto']['name'], -4)); //Pegando extensão do arquivo
        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'assets/fotos/professores/'; //Diretório para uploads

        if (move_uploaded_file($_FILES['foto']['tmp_name'], '../../'.$dir . $new_name)) //Fazer upload do arquivo
        {
            $con = conectar();
            $query = "SELECT FOTO FROM entidades WHERE CPF = :cpf";
            $smtp = $con->prepare($query);
            $smtp->bindParam(':cpf', $cpf);
            $smtp->execute();            
            $linha = $smtp->fetchObject();
            $fotoOld = $linha->FOTO;            
            unlink('../../'.$fotoOld);

            $query = "UPDATE entidades SET FOTO = :foto WHERE CPF = :cpf";
            $smtp = $con->prepare($query);
            $dirFoto = $dir . $new_name;
            $smtp->bindParam(':foto', $dirFoto);
            $smtp->bindParam(':cpf', $cpf);
            if($smtp->execute())
                header('Location: ' . $url.'/professor/painel.php');                        
        }
    }
}else{
  header('Location: ' . $url);
}
