<?php
//Model de configuração
require 'model/mod_configurantion/configurantionDAO.php';
require 'model/mod_configurantion/configuration.class.php';

$configurantionDAO    = new configurantionDAO;
$configurantion_class = new configuration;

if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){    
    //registrados no banco de dados
    $cache_css              = $_POST['cache_css'];
    $compression_css        = $_POST['compression_css'];
    $editor                 = $_POST['editor'];
    $session_time           = $_POST['time_session'];
    
    //Verificando se a sql inject
    $session_time = $secrity->AntiSql($session_time);
    if($session_time == "" || $session_time == null){
        $session_time = 60;
    }
    
    //Inserindo valores nos metodos set's
    $configurantion_class->setCache_css($cache_css);
    $configurantion_class->setCompression_css($compression_css);
    $configurantion_class->setEditor($editor);
    $configurantion_class->setSession_time($session_time);
    
    $configurantionDAO->insertConfigurantion($configurantion_class);
    
    if(isset($_POST['salvar1'])){
        header('location: index.php?option=home');
    }
}

//Del backup
if(isset($_GET['action']) && @$_GET['action'] == 'del'){
    $arquivo = SDIRECTORY."/tmp/".md5('sistema').'.zip';
    @unlink($arquivo);
    header('location: index.php?option=configurantion');
}

//Listando as informações contidas no banco de dados
foreach ($configurantionDAO->ListConfigurantion() as $resConfigurationDAO){
    $resEditorList  = $resConfigurationDAO[1];
    $resCacheCss    = $resConfigurationDAO[2];
    $resCompreCss   = $resConfigurationDAO[3];
    $resSessionTime = $resConfigurationDAO[4];
}

include 'views/html/configurantion/default.php';