<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accessDAO
 *
 * @author Raphael
 */
class accessDAO extends PDO{
    //put your code here
    private $action;
    public function __construct() {
        $this->action = new core();
    }
    public function insert($access){
        try{
            $sql = "insert into access (id_user, text, toke) values (?, ?, ?)";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $access->getId_user(), PDO::PARAM_STR);
            $insert->bindValue(2, $access->getText(), PDO::PARAM_STR);
            $insert->bindValue(3, $access->getToke(), PDO::PARAM_STR);
            
            $insert->execute();            
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function delAccess($id){
        try{
            $sql = "DELETE FROM access WHERE id_access = {$id}";
            $del = $this->action->query($sql);
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listAccessUser($id_user, $toke){
        try{
            $sql = "SELECT * FROM access WHERE id_user = {$id_user}";
            $list = $this->action->query($sql);
            return $list;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function updateAccess($access, $id_user, $toke){
        try{
            $sql = "update access set id_user = ?, text = ? where id_user = {$id_user} and toke = '{$toke}'";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $access->getId_user(), PDO::PARAM_STR);
            $insert->bindValue(2, $access->getText(), PDO::PARAM_STR);
            
            $insert->execute();            
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listAccess(){
        try{
            $sql = "SELECT * FROM access";
            $insert = $this->action->query($sql);
            return $insert;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function paginationAccess($order_by,$first,$quantity){
        try{
            $sql  = "SELECT * FROM access ORDER BY {$order_by} ASC LIMIT {$first}, {$quantity}";
            $list = $this->action->query($sql);
            return $list;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
