<?php
//Model do profile
require 'model/mod_profile/profileDAO.php';
require 'model/mod_profile/profile.class.php';
$profileDAO    = new profileDAO;
$profile_class = new profile_class;

if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){
    $secrity = new secrity;

    //Regatando os valores digitados no formulario
    $name      = $_POST['name'];
    $user_name = $_POST['user_name'];
    $pass      = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];
    $editor    = $_POST['editor'];

    //Anti - SQL inject
    $name      = $secrity->AntiSql($name);
    $user_name = $secrity->AntiSql($user_name);
    $pass      = $secrity->AntiSql($pass);
    $conf_pass = $secrity->AntiSql($conf_pass);

    $error = false;

    //Verificando se as senhas são iguais
    if($name == "" || $user_name == ""){
        $error = true;
    }elseif ($pass != "" && $conf_pass != "" && $pass != $conf_pass) {
        echo '<div class="error_system">';
        echo '<div class="separado"></div>';
        echo '<label class="error_system_msn">'.$erro['erro_pass'].'</label>';
        echo '</div>';
    }else{
        $profile_class->setName($name);
        $profile_class->setUser_name($user_name);
        $profile_class->setEditor($editor);
        
        if($pass == ""){
            foreach($profileDAO->ListPassword($_SESSION['iduser']) as $resPasswordDb);
            $profile_class->setPass($resPasswordDb[0]);
        }else{
            //Criptografica das senhas
            $pass      = $secrity->MD5($pass);
            $conf_pass = $secrity->MD5($conf_pass);
            
            $profile_class->setPass($pass);
        }           
        
        $profileDAO->UpdateUser($profile_class, $_SESSION['iduser']);
    }
    
    //Mostrando mensagem de error
    if($error == true){
        echo '<div class="error_system">';
        echo '<div class="separado"></div>';
        echo '<label class="error_system_msn">'.$erro['erro_save'].'</label>';
        echo '</div>';
    }elseif(isset($_POST['salvar1'])){
        header('location: index.php?option=home');
    }
}

//Listando as informações contidas no banco de dados
foreach($profileDAO->UserProfileList($_SESSION['iduser']) as $resUserProfile){
    $idComplet       = $resUserProfile[0];
    $nameComplet     = $resUserProfile[1];
    $userNameComplet = $resUserProfile[2];
    $editorComplet   = $resUserProfile[4];
}

require 'views/html/profile/profile.php';