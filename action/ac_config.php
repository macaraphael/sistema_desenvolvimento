<?php
$TokeFile = new TokeFile;

if(@$_GET['option'] == 'configurantion'){
    if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){
    //Escreva arquivo de configuração
    $system_name  = $_POST['system_name'];
    $end_servidor = $_POST['end_servidor'];
    $port_access  = $_POST['port_access'];
    $user_email   = $_POST['user_email'];
    $pass_email   = $_POST['pass_email'];
    $typedb       = $_POST['typedb'];
    $dbname       = $_POST['dbname'];
    $host         = $_POST['host'];
    $user         = $_POST['user'];
    $pass         = $_POST['pass'];
    $tokeConfig   = $TokeFile->code;
   
    $fp = fopen('config.php', 'w+');

    fwrite($fp, "<?php\n");
    fwrite($fp, "class SConfig{\n");
    fwrite($fp, '    public $systemname = '."'{$system_name}';\n");
    fwrite($fp, '    public $host_email = '."'{$end_servidor}';\n");
    fwrite($fp, '    public $port_access = '."'{$port_access}';\n");
    fwrite($fp, '    public $user_email = '."'{$user_email}';\n");
    fwrite($fp, '    public $pass_email = '."'{$pass_email}';\n");
    fwrite($fp, '    public $typedb  = '."'{$typedb}';\n");
    fwrite($fp, '    public $host = '."'{$host}';\n");
    fwrite($fp, '    public $user = '."'{$user}';\n");
    fwrite($fp, '    public $dbname = '."'{$dbname}';\n");
    fwrite($fp, '    public $pass = '."'{$pass}';\n");
    fwrite($fp, '    public $tokeConfig = '."'{$tokeConfig}';\n");
    fwrite($fp, "}\n");
    }
}