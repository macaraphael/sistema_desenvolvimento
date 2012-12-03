<?php
if(isset($_GET['action']) && @$_GET['action'] == 'generate_backup'){
    require 'define.php';
    require 'libraries/directory/directory.class.php';
    require 'libraries/sqlOption/sqlOption.php';
        
    $directoryOption = new directoryOption;
      
    //Copiando arquivo de instalação
    $source = SDIRECTORY.'/libraries/installationFile/installation.zip';
    $dest   = SDIRECTORY.'/tmp/installation.zip';
    
    copy($source, $dest);
    $directoryOption->Unzip($dest, SDIRECTORY.'/');
    
    unlink(SDIRECTORY.'/installation/sql/instruction.sql');
    unlink(SDIRECTORY.'/tmp/installation.zip');
    
    //Gerando backup do sql
    $sqlOption = new sqlOption;
    
    //mudar os nomes do toke
    $newNameToke = SDIRECTORY.'/delToke.php';
    $oldNameToke = SDIRECTORY.'/toke.php';
    @rename($oldNameToke, $newNameToke);
    
    //mudar os nomes da configuration
    $newNameConfiguration = SDIRECTORY.'/delConfig.php';
    $oldNameConfiguration = SDIRECTORY.'/config.php';
    @rename($oldNameConfiguration, $newNameConfiguration);
    
    $directoryOption->compact('sistema');
    $directoryOption->delDirectory('installation');
    
    //Retomando os nome do toke e config
    rename($newNameToke, $oldNameToke);
    rename($newNameConfiguration, $oldNameConfiguration);
    
    
    header('location: index.php?option=configurantion');
}