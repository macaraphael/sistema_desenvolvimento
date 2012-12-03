<?php
//Gerando sessão
if(isset($_GET['dir'])){
    $_SESSION['dir'] = $_GET['dir'];
}

if(@$_GET['dir'] == "images"){
    $directoryimages = SDIRECTORY."/images";
}elseif(@$_GET['dir'] != null && is_dir(SDIRECTORYIMAGES."/{$_GET['dir']}") != null){
    $directoryimages = SDIRECTORYIMAGES."/{$_GET['dir']}";
    $directoryimages = str_replace(SDIRECTORY."/","",$directoryimages);
}elseif(isset($_SESSION['dir'])){
    $directoryimages = SDIRECTORYIMAGES."/{$_SESSION['dir']}";
    $directoryimages = str_replace(SDIRECTORY."/","",$directoryimages);
}else{
    $directoryimages = SDIRECTORYIMAGES;
}

$end_final = SDIRECTORY."/images";

$img  = "<div id=\"bloc_name_dir\">";
$img .= "<a href=\"index.php?option=images&dir=images\" title=\"\">";
$img .= "<img src=\"media/up.png\">";
$img .= "<span class=\"name_dir\"></span>";
$img .= "</a>";
$img .= "</div>";

//Ponteiro
$ponteiro = opendir($directoryimages);

//Montar os vetores com itens
while ($name_itens = readdir($ponteiro)){
    $dir = SDIRECTORYIMAGES."/{$name_itens}";

    if(is_file($dir) != true && $name_itens != "." && $name_itens != ".."){
        $img .= "<div id=\"bloc_name_dir\">";
        $img .= "<a href=\"index.php?option=images&dir={$name_itens}\" title=\"{$name_itens}\">";
        $img .= "<img src=\"media/dir.png\">";
        $img .= "<span class=\"name_dir\">{$name_itens}</span>";
        $img .= "</a>";
        $img .= "</div>";
        
        echo $img;
    }
}