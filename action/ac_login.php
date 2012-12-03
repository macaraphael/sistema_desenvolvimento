<?php
    if(isset($_POST['login'])){
        //Chamando o model de login
        require 'model/mod_login/mod_login.php';
        
        $mod_login = new mod_login;
        $secrity   = new secrity;
        
        //Recuperando dados
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        //Verficando se ha sql inject
        $user = $secrity->AntiSql($user);
        $pass = $secrity->AntiSql($pass);
        
        //Criptografica na senha
        $pass = $secrity->MD5($pass);
        
        //Verifica se a senha esta e o usuario estão vazios
        if(empty($user) || empty($pass)){
            $error = true;
        }elseif($mod_login->countUserAcess($user, $pass)){
            $_SESSION['user']   = $user;
            foreach($mod_login->listUser($user) as $resId);
            if($resId[6] == 1){
                $_SESSION['iduser'] = $resId[0];

                //Inserindo informações para obter um controle de acesso
                require 'model/mod_access/access.php';
                require 'model/mod_access/accessDAO.php';

                //Toke de acesso
                $_SESSION['toke'] = $toke->random();

                $access    = new access;
                $accessDAO = new accessDAO;

                $text = "Login=>User: {$_SESSION['user']}|Browser: {$browser->browser_user()}|data: ".date('d/m/Y')."|Time:".date("h:i (s)")."";

                $access->setId_user($_SESSION['iduser']);
                $access->setText($text);
                $access->setToke($_SESSION['toke']);
                $accessDAO->insert($access);
            }else{
                $errorloginaccess=true;
            }
            
        }
        
        //Critografando senha
        $pass = $secrity->MD5($pass);
        header("location: index.php");
    }