<?php
require 'model/mod_system/system.php';

$system_class = new system;
$systemDAO    = new systemDAO;

//Lista as informações
foreach($systemDAO->listInfomation() as $resSystemDAO);

if($systemDAO->countDate('*', 'notice', "tonotice = {$_SESSION['iduser']}") != 0){
    foreach($systemDAO->listDate('*', 'notice', "tonotice = {$_SESSION['iduser']}") as $resNotice);
}

if($resSystemDAO[1] == null){
    //Data do systema
    $systemDate = date('d/m/Y');
    
    //Decodificando a criptografia
    if($systemDate != $resSystemDAO[3] && $resSystemDAO[1] == ""){
        //listando os dias que falta para ecerra o sistema
        for($x = 0; $x <= 31; $x++){
            if(md5($x) == $resSystemDAO[2]){
                $desCriptMd5 = $x;
                
                //Reduz os dias de ultilização do sistema    
                $desCriptMd5 = $desCriptMd5 - 1;
            }
        }
    }else{
        for($x = 0; $x <= 31; $x++){
            if(md5($x) == $resSystemDAO[2]){
                $desCriptMd5 = $x;
            }
        }
    }   
    
    //Mostrar no html
    $views_warnings = "<img src=\"media/calender.png\" border=\"0\"/><b>{$desCriptMd5}</b><span>dias</span>";
    $views_warnings_register = "<span class=\"registrer_pass\"><a href=\"index.php?option=serial\" title=\"{$system['register_serial']}\">{$system['register_serial']}</a></span>";
    
    $system_class->setDate($systemDate);
    $system_class->setSystem(md5($desCriptMd5));
    
    $systemDAO->updateDate($resSystemDAO[0], $system_class);
}elseif($resSystemDAO[1] != null && $systemDAO->countDate('*', 'notice', "tonotice = {$_SESSION['iduser']}")){
    $countNotice = $systemDAO->countDate('*', 'notice', "tonotice = {$_SESSION['iduser']}");
    if($countNotice > 1)
        echo "<a href=\"index.php?option=notice\" title=\"Ler avisos\"><span class=\"notice\">Você possui {$countNotice} avisos</span></a>";
    else
        echo "<a href=\"index.php?option=notice\" title=\"Ler aviso\"><span class=\"notice\">Você possui {$countNotice} aviso</span></a>";
}elseif($resSystemDAO[1] != null){
    $views_warnings = "<img src=\"media/dialog-warning.png\" border=\"0\" class=\"warnings_img\">";
}