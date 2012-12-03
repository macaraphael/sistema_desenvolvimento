<?php
if(isset($_POST['salvar0'])){
    //Move pacote de instalação
    $mover    = SDIRECTORY.'/tmp/'.$_FILES['fileInstallation']['name'];
    $arquivo  = $_FILES['fileInstallation']['tmp_name'];
    $nameFile = $_FILES['fileInstallation']['name'];
    move_uploaded_file($arquivo, $mover);
    
    //Renomeando arquivo
    $newName = SDIRECTORY.'/tmp/tmp-'.$_FILES['fileInstallation']['name'];
    $oldName = SDIRECTORY.'/tmp/'.$_FILES['fileInstallation']['name'];
    rename($oldName, $newName);
    
    //Separar os nomes do arquivos
    $separar = explode('.', $nameFile);
    
    //Extraindo arquivos
    $extrair = SDIRECTORY."/tmp/tmp-{$separar[0]}";
    $zip = new ZipArchive();
    $zip->open($newName);
    $zip->extractTo($extrair);
    $zip->close();
    
}


include 'views/html/install/install.php';