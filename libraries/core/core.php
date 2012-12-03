<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of core
 * @method __construct construct(construct) Metodo responsável por iniciar a conexa
 * @author Raphael
 */
class core extends PDO{
    //Objeto driver
    private $driver;
    public function __construct() {
        try{
            //instanciandor arquivo de configuração
            $SConfig = new SConfig();
            //Metodo recebendo as configurações para efeturar conexao
            $this->driver = "{$SConfig->typedb}:host={$SConfig->host};dbname={$SConfig->dbname}";
            //Criando conexao
            parent::__construct($this->driver, $SConfig->user, $SConfig->pass);
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
