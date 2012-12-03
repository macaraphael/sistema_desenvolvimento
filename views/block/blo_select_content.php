<?php
//Estrutura resposável por selecionar o conteudo a ser exibido
if($systemDAO->checkCod(INFORMATION)){
    switch (@$_GET['option']){
        case 'my_profile':
            require 'controller/profile/default.php';
            break;
        case 'configurantion':
            require 'controller/configurantion/default.php';
            break;
        case 'user':
            require 'controller/user/default.php';
            break;
        case 'warnings':
            require 'controller/warnings/default.php';
            break;
        case 'install':
            require 'controller/install/default.php';
            break;
        case 'system_tools':
            require 'controller/system_tools/default.php';
            break;
        case 'access':
            require 'controller/access/default.php';
            break;
        case 'serial':
            require 'controller/serial/default.php';
            break;
        case 'notice':
            require 'controller/notice/default.php';
            break;
        case 'images':
            require 'controller/images/default.php';
            break;
        default :
            require 'views/html/home/home.php';
            break;
    }
}else{
    require 'controller/serial/default.php';
}