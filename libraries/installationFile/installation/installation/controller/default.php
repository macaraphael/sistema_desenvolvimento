<?php
require '../libraries/secrity/secrity.php';
require '../libraries/toke/toke.php';

$toke    = new toke();
$secrity = new secrity;

//Verificar se a permissão
$folder = array(1 => 'action', 2 => 'cache', 3 => 'controller', 4 => 'language', 5 => 'libraries', 6 => 'logs', 7 => 'media', 8 => 'views');

if(isset($_POST['salvar'])){
    //Captura os dados do formulario
    $system_name    = $_POST['system_name'];
    $host_data_base = $_POST['host_data_base'];
    $user_data_base = $_POST['user_data_base'];
    $db_name        = $_POST['db_name'];
    $port_access    = $_POST['port_access'];
    $pass_data_base = $_POST['pass_data_base'];
    $host_email     = $_POST['host_email'];
    $user_email     = $_POST['user_email'];
    $pass_email     = $_POST['pass_email'];

    //Verifica  se a injeção de sql
    $system_name    = $secrity->AntiSql($system_name);
    $host_data_base = $secrity->AntiSql($host_data_base);
    $user_data_base = $secrity->AntiSql($user_data_base);
    $pass_data_base = $secrity->AntiSql($pass_data_base);
    $db_name        = $secrity->AntiSql($db_name);
    $port_access    = $secrity->AntiSql($port_access);
    $host_email     = $secrity->AntiSql($host_email);
    $user_email     = $secrity->AntiSql($user_email);
    $pass_email     = $secrity->AntiSql($pass_email);
    
    //Verifica se os dados estão com os dados
    if($host_data_base == "" || $user_data_base == "" || $db_name == "" || $host_email == "" || $user_email == "" || $pass_email == ""){
        header('location: index.php&return=error');
    }else{
        //Criando conexao com o banco
        mysql_connect($host_data_base, $user_data_base, $pass_data_base);
        if(!mysql_select_db(@$banco)){
                mysql_query("CREATE DATABASE {$db_name}");
                mysql_select_db($db_name);
        }
		
        //Lendo arquivo de sql
        $nome_do_arquivo = 'sql/instruction.sql';
        $arquivo = array();
        //Pega Cada Linha e Joga na Matriz $arquivo
        $arquivo = file($nome_do_arquivo);
        // Cria a Variavel $prepara
        $prepara = "";
        //executa um loop pegando cada valor da Matriz e concatenando na variavel $prepara
        foreach($arquivo as $v) $prepara.=$v;
        //Divide a variavel em varios pedaços independente de instruçoes SQL'S tiverem no arquivo, separando por ponto e virgula, criando assim a matriz $sql
        $sql = explode(";",$prepara);
        //Executa um Loop Retornando cada valor da matriz $sql, q está em $v, ou seja cada valor do $v é uma instrução sql diferente
        foreach($sql as $v) mysql_query($v);
	
        //Gerando arquivo de configuração
        $fp = fopen('../config.php', 'w+');
        
        $tokeCode = $toke->random();
        
        fwrite($fp, "<?php\n");
        fwrite($fp, "class SConfig{\n");
        fwrite($fp, '    public $systemname = "'.$system_name.'";'."\n");
        fwrite($fp, '    public $host_email = "'.$host_email.'";'."\n");
        fwrite($fp, '    public $port_access = "'.$port_access.'";'."\n");
        fwrite($fp, '    public $user_email = "'.$user_email.'";'."\n");
        fwrite($fp, '    public $pass_email = "'.$pass_email.'";'."\n");
        fwrite($fp, '    public $typedb = "mysql";'."\n");
        fwrite($fp, '    public $host = "'.$host_data_base.'";'."\n");
        fwrite($fp, '    public $user = "'.$user_data_base.'";'."\n");
        fwrite($fp, '    public $dbname = "'.$db_name.'";'."\n");
        fwrite($fp, '    public $pass = "'.$pass_data_base.'";'."\n");
        fwrite($fp, '    public $tokeConfig = "'.$tokeCode.'";'."\n");
        fwrite($fp, '}');
        
        //Gerando arquivo de toke
        $fp = fopen('../toke.php', 'w+');
        
        fwrite($fp, "<?php\n");
        fwrite($fp, 'class TokeFile{'."\n");
        fwrite($fp, '    public $code = "'.$tokeCode.'";'."\n");
        fwrite($fp, '}');
        
        header("location: ../index.php");
    }
    
    
}

//Views
include 'views/index.php';