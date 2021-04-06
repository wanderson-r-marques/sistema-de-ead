<?php
/*
* Classe MarcaDagua
* Descricao: Classe que realiza conexao com o banco de dados. 
*
*
* ########   EXEMPLO  #########
* $marca = new MarcaDagua();
* $marca->gera("$foto", "$marca", "$saida", $posicao, $transparencia);
*
* # TABELA DE POSI��ES
*   1 - Topo Esquerdo
*   2 - Topo Direito
*   3 - Rodap� Esquerdo
*   4 - Rodap� Direito
*   5 - Centro
*   6 - Centro Direito
*   7 - Rodap� Centralizado
*   8 - Centralizado Esquerdo
*
* */

class MarcaDagua {

    function MarcaDagua() {
        if(!function_exists("ImageCreateTrueColor")){
            if(!function_exists("ImageCreate")){
                echo "Voc� n�o possui a biblioteca GD carregada no PHP!";
                exit;
            }
        }
    }

    function gera($imagemfonte, $marcadagua, $imagemdestino, $pos = 0, $transicao = 60){
        // Obt�m o cabe�alho de ambas as imagens
        $funcao = $this->verifica_tipo($marcadagua, "abrir");
        $marcadagua_id = $funcao($marcadagua);
        $funcao = $this->verifica_tipo($imagemfonte, "abrir");
        $imagemfonte_id = $funcao($imagemfonte);

        // Obt�m os tamanhos de ambas as imagens
        $imagemfonte_data = getimagesize($imagemfonte);
        $marcadagua_data = getimagesize($marcadagua);
        $imagemfonte_largura = $imagemfonte_data[0];
        $imagemfonte_altura = $imagemfonte_data[1];
        $marcadagua_largura = $marcadagua_data[0];
        $marcadagua_altura = $marcadagua_data[1];

        // Aqui, defini-se a posi��o onde a marca deve aparecer na foto

        // Centralizado
        if( $pos == 0 ) {
            $dest_x = ( $imagemfonte_largura / 2 ) - ( $marcadagua_largura / 2 );
            $dest_y = ( $imagemfonte_altura / 2 ) - ( $marcadagua_altura / 2 );
        }

        // Topo Esquerdo
        if( $pos == 1 )    {
            $dest_x = 0;
            $dest_y = 0;
        }

        // Topo Direito
        if( $pos == 2 )    {
            $dest_x = $imagemfonte_largura - $marcadagua_largura;
            $dest_y = 0;
        }

        // Rodap� Direito
        if( $pos == 3 )    {
            $dest_x = ($imagemfonte_largura - $marcadagua_largura) - 5;
            $dest_y = ($imagemfonte_altura - $marcadagua_altura) - 5;
        }

        // Rodap� Esquerdo
        if( $pos == 4 )    {
            $dest_x = 0;
            $dest_y = $imagemfonte_altura - $marcadagua_altura;
        }

        // Topo Centralizado
        if( $pos == 5 )    {
            $dest_x = ( ( $imagemfonte_largura - $marcadagua_largura ) / 2 );
            $dest_y = 0;
        }

        // Centro Direito
        if( $pos == 6 )    {
            $dest_x = $imagemfonte_largura - $marcadagua_largura;
            $dest_y = ( $imagemfonte_altura / 2 ) - ( $marcadagua_altura / 2 );
        }

        // Rodap� Centralizado
        if( $pos == 7 ) {
            $dest_x = ( ( $imagemfonte_largura - $marcadagua_largura ) / 2 );
            $dest_y = $imagemfonte_altura - $marcadagua_altura;
        }

        // Centro Esquerdo
        if( $pos == 8 ) {
            $dest_x = 0;
            $dest_y = ( $imagemfonte_altura / 2 ) - ( $marcadagua_altura / 2 );
        }
        // A fun��o principal: misturar as duas imagens
        imageCopyMerge($imagemfonte_id, $marcadagua_id, $dest_x, $dest_y, 0, 0, $marcadagua_largura, $marcadagua_altura, $transicao);

        // Cria a imagem com a marca da agua
        $funcao = $this->verifica_tipo($imagemdestino, "salvar");
        $funcao($imagemfonte_id, $imagemdestino, 90);
    }

    // Verifica o tipo da imagem e retorna a fun��o para uso
    function verifica_tipo($nome, $acao) {
        if(eregi("^(.*)\.(jpeg|jpg)$", $nome)) {
            if($acao == "abrir") {
                return "imageCreateFromJPEG";
            }
        else {
            return "imagejpeg";
        }
        }elseif(eregi("^(.*)\.(png)$", $nome)){
            if($acao == "abrir") {
                return "imageCreateFromPNG";
            }else {
                return "imagepng";
            }
        }else{
            echo "Formato de Imagem Inv�lido!<br>A imagem deve ser PNG ou JPEG!";
            die;
        }
    }

    
}

// Definido par�metros como o endere�o das imagens, a posi��o da marca na imagem, a porcentagem de transpar�ncia da marca e onde a marca pronta ser� armazenada


?>