<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sidebarDAO
 *
 * @author Raphael
 */
class sidebarDAO extends PDO{
    //put your code here
    private $action;
    public function __construct(){
        $this->action = new core();
    }
    public function listWarnings($id_user){
        try{
            $sql = "select * from warnings";
            $list = $this->action->query($sql);
            return $list;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function countWarnings($id_user){
        try{
            $sql   = "select * from warnings where user = {$id_user}";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listUserWarnings($id_user){
        try{
            $sql   = "select * from user where id_user = {$id_user}";
            $list  = $this->action->query($sql);
            return $list;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
