<?php
    //Iniciando sessão
    session_start();
    
    //Verificação do browser
    require 'libraries/browser/browser.php';
    $browser = new browser;
        
    //Verifica a existencia dos arquivos de configurações
    if(is_file('config.php') && is_file('toke.php')){
        require 'toke.php';
        $TokeFile = new TokeFile;
        
        //Escreve arquivo de configuraçãp
        require 'action/ac_config.php';
        
        require 'config.php';

        $SConfig  = new SConfig;
        
        
        //Arquivo de definições
        require 'define.php';

        //Bibliotecas
        require 'libraries/include.php';

        //Controller das linguages
        require 'controller/language/default.php';

        //Verifica se o login foi efetuado
        include 'action/ac_login.php';

        //verfica se o login foi encerrado pelo administrador
        include 'action/ac_checked.php';

        if($TokeFile->code == $SConfig->tokeConfig){
            //backup installation
            include 'action/ac_installation.php';
        }
        
        //backup system
        include 'action/ac_backup.php';
    }
    if(is_file('delConfig.php') || is_file('delToke.php')){
        @unlink('delConfig.php');
        @unlink('delToke.php');
    }
    
    foreach($systemDAO->listInfomation() as $resSystemDAO);
    
    //Descobrir quantos dias falta
    for($x = 0; $x <= 31; $x++){
        if(md5($x) == $resSystemDAO[2]){
            $falta = $x;
        }
    }
    
    if($browser->browser_user() == 'IE'){
        header('location: http://br.mozdev.org/');
    }elseif(is_dir('installation') || $TokeFile->code != $SConfig->tokeConfig){
        header('location: installation');
    }elseif(isset($_SESSION['iduser']) && isset($_SESSION['user']) && isset($_SESSION['toke'])){
        include 'views/system.php';
    }else{
        include 'views/login.php';
    }
?>