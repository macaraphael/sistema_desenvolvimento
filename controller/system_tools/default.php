<?php
//Listando arquivos de cache do sistema
$path = SDIRECTORY."/cache";
$diretorio = dir($path);
$temarquivo = false;
while($arquivo = $diretorio -> read()){
    if($arquivo != '.' && $arquivo != ".." && $arquivo != 'index.html'){ 
        if(@$_GET['action'] == 'cache_clear'){
            $apagar = SDIRECTORY."/cache/{$arquivo}";
            @unlink($apagar);
        }else{
            $temarquivo = true;
        }
    }
}

//View
include 'views/html/system_tools/default.php';