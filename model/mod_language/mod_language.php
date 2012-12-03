<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_language
 *
 * @author Raphael
 */
class mod_language extends core{
    //Metode de ação do banco
    private $action;
    public function __construct() {
        $this->action = new core();
    }
    public function ListLanguageDb(){
        try{
            $sql = "SELECT * FROM language";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
