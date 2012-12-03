<?php
require 'model/mod_access/accessDAO.php';
$accessDAO = new accessDAO;

//Paginação
$page     = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$quantity = 10;
$first    = ($quantity * $page) - $quantity;

//Criando numeros para páginar
$numTotal  = $systemDAO->countPagination('access');
$totalPage = ceil($numTotal/$quantity);

//Dados selecionados
if(isset($_POST['del'])){
    $list = $_POST['list'];
    foreach($list as $resList){
        $accessDAO->delAccess($resList);
    }
}

include 'views/html/access/default.php';