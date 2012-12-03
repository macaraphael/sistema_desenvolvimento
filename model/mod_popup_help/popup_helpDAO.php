<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of popup_helpDAO
 *
 * @author Raphael
 */
class popup_helpDAO extends Exception{
    //put your code here
    private $action;
    public function __construct() {
        $this->action = new core;
    }
    public function countDataAllHelp(){
        try{
            $sql   = "SELECT * FROM help";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listDateAllHelp(){
        try{
            $sql  = "SELECT * FROM help";
            $list = $this->action->query($sql);
            return $list;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function searchDataAllHelp($search){
        try{
            $sql  = "SELECT * FROM help WHERE related LIKE '%{$search}%' OR text LIKE '%{$search}%'";
            $list = $this->action->query($sql);
            return $list;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function countSearchDataAllHelp($search){
        try{
            $sql   = "SELECT * FROM help WHERE related LIKE '%{$search}%' OR text LIKE '%{$search}%'";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
