<?php
   class cache{
       public function optionCss($busca, $nomeArquivo, $ext, $compress){
            $arquivo = fopen($busca, 'r');
            @mkdir('cache');
            $cache   = 'cache/'.md5($nomeArquivo).$ext;
            @unlink($cache);
            if(is_file($cache)){
                return $cache;
            }else{
                $saida = null;
                while (!feof($arquivo)){
                    $saida .= fgets($arquivo, 4096);
                }
                
                if($compress == 1){
                    // Remover comentarios
                    $saida = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $saida);
                    // Remover Tabs e NewLines
                    $saida = preg_replace('#(\r|\n|\t)#', '', $saida);
                    // Remover caracteres com espaços extras
                    $saida = preg_replace('#[ ]*([,:;\{\}])[ ]*#', '$1', $saida);
                    // Extras
                    $saida = strtr($saida, array(
                            ';}' => '}'
                    ));
                }
                
                fclose($arquivo);

                $fh     = fopen($cache, 'w+') or die('erro ao escrever o arquivo');
                
                fwrite($fh, $saida);
                return $cache;
            }
        }
    }