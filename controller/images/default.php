<?php
if(isset($_POST['create'])){
    $create_folder = $_POST['create_folder'];
    
    //Verifica se a dir foi passada na url
    if(@$_GET['dir'] != null){
        $dir = SDIRECTORYIMAGES."/{$_GET['dir']}";
    }else{
        $dir = SDIRECTORYIMAGES;
    }
    
    //Criando pasta
    $create = $dir."/{$create_folder}";
    if(mkdir($create)){
        //Copiando arquivo
        $new = "{$create}/index.html";
        $old = SDIRECTORYIMAGES."/index.html";
        copy($old, $new);
    }
    
}

//views
include 'views/html/images/images.php';