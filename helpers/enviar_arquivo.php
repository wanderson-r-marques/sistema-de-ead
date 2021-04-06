<?php 
    function enviar_arquivo($arquivo,$nome_arquivo){
        // Verifica se foi enviado um arquivo
        if (isset($arquivo)) {                
            // Verificando tipo de arquivo
            $bool = false;
            $tipo_arquivo = mime_content_type($arquivo['tmp_name']);
            
            switch ($tipo_arquivo) {
                case 'image/jpeg':
                    $bool = true;
                    $ext = '.jpeg';
                    break;
                case 'image/jpg':
                    $bool = true;
                    $ext = '.jpg';
                    break;
                case 'image/JPEG':
                    $bool = true;
                    $ext = '.JPEG';
                    break;
                case 'image/JPG':
                    $bool = true;
                    $ext = '.JPG';
                    break;
                case 'image/gif':
                    $bool = true;
                    $ext = '.gif';
                    break;
                case 'image/png':
                    $bool = true;
                    $ext = '.png';
                    break;
                case 'application/pdf': 
                    $bool = true;
                    $ext = '.pdf';
                    break;
                case 'application/msword': 
                    $bool = true;
                    $ext = '.doc';
                    break;
                      
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 
                    $bool = true;
                    $ext = '.docx';
                break;
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 
                    $bool = true;
                    $ext = '.DOCX';
                break;
                case 'application/vnd.ms-excel': 
                    $bool = true;
                    $ext = '.xls';
                break;
                case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 
                    $bool = true;
                    $ext = '.xlsx';
                break;
                case 'video/mp4': 
                    $bool = true;
                    $ext = '.mp4';
                break;
                default:
                    $bool = false;
                    break;
            }

            if ($bool) {                 
                
                if(move_uploaded_file($arquivo['tmp_name'], $nome_arquivo . $ext)){                    
                    return $nome_arquivo . $ext;
                }else{                    
                    return 0; 
                }                
            }else{
                return -1;
            }
        }
    }
