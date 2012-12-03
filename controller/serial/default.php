<?php
require 'model/mod_serial/serial.class.php';
require 'model/mod_serial/serialDAO.php';

$serial_class = new serial;
$serialDAO    = new serialDAO;
$secrity      = new secrity;

if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){
    $serial_cod = $secrity->AntiSql($_POST['serial']);
    
    if($serial_cod == "AHR0CDOVL2XVY2FSAG9ZDC9ZAXN0ZW1HL3RLC3RLL2LUZGV4LNBOCD86CMFWAGFLBERLC2VUDM9SDMLTZW50B3M="){
        $serial_class->setSerial($serial_cod);
        $serialDAO->insertSerial($serial_class);
        
        //registrar o arquivos
        $fp = fopen('information.ini', 'w+');
        
        fwrite($fp, "information=\"AHR0CDOVL2XVY2FSAG9ZDC9ZAXN0ZW1HL3RLC3RLL2LUZGV4LNBOCD86CMFWAGFLBERLC2VUDM9SDMLTZW50B3M=\"");
        
        header('location: index.php');
    }else{
        $erro_serial = "<span class=\"erro_serial\">{$serial['serial_wrong']}</span>";
    }
}

include 'views/html/serial/default.php';