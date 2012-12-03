<?php
//Inciando sessão
session_start();

//Requeriando bibliotecas
require '../libraries/core/core.php';
require '../libraries/logs/logs.php';
require '../libraries/browser/browser.php';
require '../config.php';
require '../model/mod_access/access.php';
require '../model/mod_access/accessDAO.php';

//Instanciando as variaveis
$accessDAO = new accessDAO;
$browser   = new browser();
$access    = new access;
$accessDAO = new accessDAO;

//Texto recebe valor nulo
$text = null;

//Logoff
$logoff = "|Logoff=>User: {$_SESSION['user']}|Browser: {$browser->browser_user()}|data: ".date('d/m/Y')."|Time:".date("h:i (s)")."";
foreach($accessDAO->listAccessUser($_SESSION['iduser'], $_SESSION['toke']) as $resAcesso){
    $text .= $resAcesso[2].$logoff;
}

//Setando os valores
$access->setId_user($_SESSION['iduser']);
$access->setText($text);
$accessDAO->updateAccess($access, $_SESSION['iduser'], $_SESSION['toke']);

$file = '../logs/logs_access.txt';
@unlink($file);

$fp = fopen($file, "w+");

foreach($accessDAO->listAccess() as $resListALL){
    $separar = explode('|', $resListALL[2]);
    
    fwrite($fp, "----------------------------------------------------------------------------------------------------------------------------\n");
    fwrite($fp, "{$separar[0]}\n");
    fwrite($fp, "{$separar[1]}\n");
    fwrite($fp, "{$separar[2]}\n");
    fwrite($fp, "{$separar[3]}\n");
    fwrite($fp, "{$separar[4]}\n");
    fwrite($fp, "{$separar[5]}\n");
    fwrite($fp, "{$separar[6]}\n");
    fwrite($fp, "{$separar[7]}\n");
    fwrite($fp, "----------------------------------------------------------------------------------------------------------------------------\n");
}

fclose($fp);

//Destroi sessão
session_destroy();

//Redireciona
header('location: ../index.php');