<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_login
 *
 * @author Raphael
 */
class mod_login extends PDO{
    private $action;
    public function __construct(){
        $this->action = new core;
    }
    //Conta para ver ser o usuario o senha informados, possui acesso
    public function countUserAcess($user, $pass){
        try{
            $sql   = "select * from user where user_name = '{$user}' and password = '{$pass}'";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    //Listando o usuario ja indentificado
    public function listUser($user){
        try{
            $sql   = "select * from user where user_name = '{$user}'";
            $list  = $this->action->query($sql);
            return $list;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
