<?php
//requirindo model de acesso ao negocio das linguages
require 'model/mod_language/mod_language.php';
$mod_language = new mod_language();

//Listando as linguages contidos no banco
foreach($mod_language->ListLanguageDb() as $resLanguage);
$tipo = $resLanguage[1];

//Listando todos os arquivos de linguage
$path = SDIRECTORY."/language/{$resLanguage[1]}";
$diretorio = dir($path);
while($arquivo = $diretorio -> read()){
    if($arquivo != '.' && $arquivo != ".." && $arquivo != 'index.html'){
        //Seperando o nome do arquivo da extenção
        $separar = explode('.', $arquivo);
        //Pegando arquivo de linguage
        ${$separar[0]} = parse_ini_file("language/{$tipo}/{$arquivo}");
    }
}

$diretorio->close();