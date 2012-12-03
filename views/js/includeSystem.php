<?php
$systemDAO = new systemDAO();
foreach($systemDAO->listDate('*','configurantion') as $resSystem);
foreach($systemDAO->listDate('editor','user', "id_user = {$_SESSION['iduser']}") as $resEditorUser);
?>
<script type="text/javascript" src="views/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="views/js/jquery-ui.js"></script>
<script type="text/javascript" src="views/js/jquery.validate.js"></script>
<script type="text/javascript" src="views/js/optionTabs.js"></script>
<script type="text/javascript" src="views/js/table.js"></script>
<script type="text/javascript" src="views/js/validacao.js"></script>
<script type="text/javascript" src="views/js/empty_feild.js"></script>
<script type="text/javascript" src="views/js/chackall.js"></script>

<script type="text/javascript">
var count = new Number();
var count = <?php echo $resSystem[4]; ?>;

function Start(){
    if((count - 1) >= 0){
        count = count - 1;
        tempo.innerHTML = count;
        setTimeout('Start();',10000);
    }else{
        window.location = 'action/ac_logoff.php';
    }
}
</script>
<!------popup-------->
<script language="javascript" src="views/js/popup.js"></script>


<?php 
$okEditor = false;
//Editor selecionado pelo o usuario
if($resEditorUser[0] == 'tiny_mce'){
    echo '<script src="libraries/tiny_mce/tiny_mce.js"></script>';
    echo '<script src="libraries/tiny_mce/type_edit/accessibility.js"></script>';
    $okEditor = true;
}

//Editor selecionado pelo o geral
if($resEditorUser[0] == 'standard' && $resSystem[1] == 'tiny_mce' && $okEditor == false){
    echo '<script src="libraries/tiny_mce/tiny_mce.js"></script>';
    echo '<script src="libraries/tiny_mce/type_edit/accessibility.js"></script>';
}

//include 'libraries/ckeditor/ckeditor.php';

?>