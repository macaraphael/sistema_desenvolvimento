<?php
require 'model/mod_user/userDAO.php';
require 'model/mod_user/user.class.php';

$userDAO   = new userDAO;
$userclass = new user;
$secrity   = new secrity;


if(@$_GET['action'] == 'new'){
    if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){
        //Recebendo os dados do formularios
        $name      = $_POST['name'];
        $user_name = $_POST['user_name'];
        $pass      = $_POST['pass'];
        $conf_pass = $_POST['conf_pass'];
        $lavel     = (isset($_POST['lavel'])) ? (int)$_POST['lavel'] : 0;
        $editor    = (isset($_POST['editor'])) ? $_POST['editor'] : 'no';
        
        //Verificando se ha sql
        $name      = $secrity->AntiSql($name);
        $user_name = $secrity->AntiSql($user_name);
        $pass      = $secrity->AntiSql($pass);
        $conf_pass = $secrity->AntiSql($conf_pass);
        $lavel     = $secrity->AntiSql($lavel);
        $editor    = $secrity->AntiSql($editor);
        
        //Se a senha e a confirmação da senha são iguais
        if($userDAO->verifyExistenceUser($user_name) != 0){
            echo '<div class="error_system">';
            echo '<div class="separado"></div>';
            echo '<label class="error_system_msn">'.$erro['exist_user'].'</label>';
            echo '</div>';
        }elseif($pass == $conf_pass){
            $pass = $secrity->MD5($pass);
            
            $userclass->setName($name);
            $userclass->setUser_name($user_name);
            $userclass->setPass($pass);
            $userclass->setLavel($lavel);
            $userclass->setEditor($editor);
            $userclass->setDisable_enable('0');
            
            $userDAO->insertUser($userclass);
        }else{
            echo '<div class="error_system">';
            echo '<div class="separado"></div>';
            echo '<label class="error_system_msn">'.$erro['erro_pass'].'</label>';
            echo '</div>';
        }
    }
    
    
    include 'views/html/user/new.php';
}elseif(@$_GET['action'] == 'edit'){
    //Recedendo inforamações para alterações
    $idAlterar = $_GET['id'];
    
    if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){
        //Recebendo dados do usuario
        $name      = $_POST['name'];
        $user_name = $_POST['user_name'];
        $pass      = $_POST['pass'];
        $conf_pass = $_POST['conf_pass'];
        $lavel     = $_POST['lavel'];
        $editor    = $_POST['editor'];

        //Tratando informações
        $name      = $secrity->AntiSql($name);
        $user_name = $secrity->AntiSql($user_name);
        $pass      = $secrity->AntiSql($pass);
        $conf_pass = $secrity->AntiSql($conf_pass);
        $lavel     = $secrity->AntiSql($lavel);
        $editor    = $secrity->AntiSql($editor);

        //Verificando se as senhas são iguais
        if($userDAO->verifyExistenceUser($user_name) != 0){
            echo '<div class="error_system">';
            echo '<div class="separado"></div>';
            echo '<label class="error_system_msn">'.$erro['exist_user'].'</label>';
            echo '</div>';
        }elseif($pass == $conf_pass){
            $pass = $secrity->MD5($pass);

            $userclass->setName($name);
            $userclass->setUser_name($user_name);
            $userclass->setPass($pass);
            $userclass->setLavel($lavel);
            $userclass->setEditor($editor);

            $userDAO->updateUser($userclass, $_GET['id']);
        }else{
            echo '<div class="error_system">';
            echo '<div class="separado"></div>';
            echo '<label class="error_system_msn">'.$erro['erro_pass'].'</label>';
            echo '</div>';
        }
    }
    
    
    //Listando informação
    foreach($userDAO->userId($idAlterar) as $resUserAlterar);
    
    if(isset($_POST['salvar1'])){
        header('location: index.php?option=user');
    }
    
    //View
    include 'views/html/user/edit.php';
}else{
    //Paginação
    $page     = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $quantity = 3;
    $first    = ($quantity * $page) - $quantity;

    //Criando numeros para páginar
    $numTotal  = $systemDAO->countPagination('user');
    $totalPage = ceil($numTotal/$quantity);
    
    //Habilia ou desabilitar usuario
    if(isset($_GET['action'])){
        //Capturando id
        $userclass->setId($_GET['id']);
        //Verificando se esta abilitado
        if($_GET['action'] == 'enable'){
            $userclass->setDisable_enable(1);
        }elseif($_GET['action'] == 'disable'){
            $userclass->setDisable_enable(0);
        }
        $userDAO->disable_enable($userclass, $_GET['id']);
    }
    
    //Verificando se ouve o deletar
    if(isset($_POST['del']) && isset($_POST['tools_views']) && @$_POST['userSelect'] != ""){
        $userSelect = $_POST['userSelect'];
        //Visualizando o array
        foreach($userSelect as $viewUserSelect){
            //Pegando o id
            $idUser = $viewUserSelect;
            echo $userDAO->delUser($idUser);
        }
    }

    include 'views/html/user/default.php';
}