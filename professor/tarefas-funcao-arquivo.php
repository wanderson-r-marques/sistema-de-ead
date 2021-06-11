<?php
// Função para colocar os arquivos
function tarefas_cadastrar($id, $arquivos, $links, $tipo, $con)
{
    $data_hora = date("Y-m-d-H-i-s");
    // Envia os inputs de arquivos
    if (count($links)) {
        foreach ($links as $key => $value) {
            if ($value != '') {
                try {
                    $query = "INSERT INTO `materiais_tarefa` (                            
                                        `PK_CADASTRO_TAREFA`,
                                        `LINK`,
                                        `TIPO_MATERIAL`,
                                        `DATA_HORA`
                                      )
                                      VALUES
                                        (
                                          :PK_CADASTRO_TAREFA,
                                          :LINK,
                                          :TIPO_MATERIAL,
                                          :DATA_HORA
                                        )";
                    $tipoTarefa = $tipo[$key];
                    $smtp = $con->prepare($query);
                    $smtp->bindParam(':PK_CADASTRO_TAREFA', $id);
                    $smtp->bindParam(':LINK', $value);
                    $smtp->bindParam(':TIPO_MATERIAL', $tipoTarefa);
                    $smtp->bindParam(':DATA_HORA', $data_hora);
                    $smtp->execute();
                } catch (PDOException $th) {
                    $th->getMessage();
                    die;
                }
            }
        }
    }

    // Envia os inputs de arquivos
    if (is_array($arquivos)) {
        foreach ($arquivos['error'] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $ext = pathinfo($arquivos['name'][$key], PATHINFO_EXTENSION);
                $tmp_name = $arquivos['tmp_name'][$key];
                $name = slugify($arquivos['name'][$key]);
                $tipoTarefa = $tipo[$key];

                $new_name =  date("Y-m-d-H-i-s") . '-' . $name . '.' . $ext;
                $dir = '../assets/arquivos/' . date("Y-m-d"); //Diretório para uploads
                if (!is_dir($dir))
                    mkdir($dir, 0755, true);
                $path = $dir . '/' . $new_name;

                if (move_uploaded_file($tmp_name, $dir . '/' . $new_name)) //Fazer upload do arquivo
                {
                    try {
                        $query = "INSERT INTO `materiais_tarefa` (                            
                            `PK_CADASTRO_TAREFA`,
                            `LINK`,
                            `TIPO_MATERIAL`,
                            `DATA_HORA`
                          )
                          VALUES
                            (
                              :PK_CADASTRO_TAREFA,
                              :LINK,
                              :TIPO_MATERIAL,
                              :DATA_HORA
                            )";
                        $smtp = $con->prepare($query);
                        $smtp->bindParam(':PK_CADASTRO_TAREFA', $id);
                        $smtp->bindParam(':LINK', $path);
                        $smtp->bindParam(':TIPO_MATERIAL', $tipoTarefa);
                        $smtp->bindParam(':DATA_HORA', $data_hora);
                        $smtp->execute();
                    } catch (PDOException $th) {
                        $th->getMessage();
                        die;
                    }
                }
            }
        }
    }
}

function slugify($string)
{
    $explode = explode('.', $string);
    $string = str_replace('.', '-', $explode[0]);
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
}
