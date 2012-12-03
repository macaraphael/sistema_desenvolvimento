<?php
//Verifica a existencia da pasta
if(is_dir('installation')){
    @unlink('installation/sql/instruction.sql');
    
    //Gera backup do sql
    require 'libraries/sqlOption/sqlOption.php';
    $sqlOption = new sqlOption;
    
    //Gerando backup do installation
    require 'libraries/directory/directory.class.php';
    $directoryOption = new directoryOption;
    
    $directoryOption->compact('installation', 'installation');
    
    //Renomeando
    $oldname = SDIRECTORY.'/tmp/'.md5('installation').'.zip';
    $newname = SDIRECTORY.'/tmp/installation.zip';
    rename($oldname, $newname);
    
    //mover
    $oldnamecopy = SDIRECTORY.'/tmp/installation.zip';
    $newnamecopy = SDIRECTORY.'/libraries/installationFile/installation.zip';
    @mkdir('libraries/installationFile');
    @unlink($newnamecopy);
    copy($oldnamecopy, $newnamecopy);
    
    //Apagando arquivo da pasta tmp e a pasta de instalação
    @unlink($oldnamecopy);
    $directoryOption->delDirectory('installation');
}