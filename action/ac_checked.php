<?php
require 'model/mod_system/systemDAO.php';
$systemDAO = new systemDAO();
//listando informações
if(isset($_SESSION['iduser'])){
    foreach($systemDAO->listDate('disable_enable', 'user', 'id_user='.@$_SESSION['iduser']) as $resUser){
        if($resUser[0] == 0){
            header('location: action/ac_logoff.php');
        }
    }
}