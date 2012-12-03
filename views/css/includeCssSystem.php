<?php
//Chamando o model de cache e instanciando
require 'model/mod_cache/cacheDAO.php';
$cacheDAO = new cacheDAO;
$cache    = new cache;

//Listando as linguages contidos no banco
foreach($mod_language->ListLanguageDb() as $resLanguage);
$tipo = $resLanguage[1];

//Listando todos os arquivos de linguage
$path = SDIRECTORY."/views/css";
$diretorio = dir($path);
while($arquivo = $diretorio -> read()){
    if($arquivo != '.' && $arquivo != ".."&& $arquivo != 'login.css' && $arquivo != 'index.html' && $arquivo != 'popuphelp.css' && $arquivo != 'includeCssSystem.php' && $arquivo != 'includeCssLogin.php'){
        //Verifica se é para gerar chace do sistema
        if($cacheDAO->cacheCss() == '1' && $cacheDAO->cacheCssCompress() == '0'){
            //Pegando apenas o nome do arquivo
            $separar  = explode('.', $arquivo);
            //Gerando cache do sistema
            $cssCache = $cache->optionCss("views/css/{$arquivo}", $separar[0], '.css', '0');
            //Arquivo css
            echo '<link href="'.$cssCache.'" rel="stylesheet" media="screen" type="text/css" />'."\n";
        }elseif($cacheDAO->cacheCssCompress() == '1'){//Pegando apenas o nome do arquivo
            //Pegando apenas o nome do arquivo
            $separar  = explode('.', $arquivo);
            //Gerando cache do sistema
            $cssCache = $cache->optionCss("views/css/{$arquivo}", $separar[0], '.css', '1');
            //Arquivo css
            echo '<link href="'.$cssCache.'" rel="stylesheet" media="screen" type="text/css" />'."\n";
        }else{
            echo '<link href="views/css/'.$arquivo.'" rel="stylesheet" media="screen" type="text/css" />'."\n";
        }
    }
}

$diretorio->close();