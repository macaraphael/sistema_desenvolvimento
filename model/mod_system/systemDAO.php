<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of systemDAO
 *
 * @author Raphael
 */
class systemDAO extends PDO{
    //put your code here
    private $action;
    public function __construct() {
        $this->action = new core();
    }
    public function countDate($params, $table, $where = null){
        try{
            if(@$where != null)
                $where = "WHERE {$where}";
                
            $sql   = "SELECT {$params} FROM {$table} {$where}";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listDate($params, $table, $where = null){
        try{
            if($where != null){
                $where = 'where '.$where;
            }
            $sql = "select {$params} from {$table} {$where}";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listInfomation(){
        try{
            $sql = "SELECT * FROM information";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function countPagination($tables){
        try{
            $sql   = "SELECT * FROM {$tables}";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function pagination($table, $order_by, $first, $quantity){
        try{
            $sql  = "SELECT * FROM {$table} ORDER BY {$order_by} ASC LIMIT {$first}, {$quantity}";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function retriction($id_user){
        try{
            $sql   = "SELECT level FROM user WHERE id_user = {$id_user} AND level = 1";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function checkCod($serial){
        try{
            $sql   = "SELECT serial FROM information WHERE serial = '{$serial}'";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function updateDate($id, $system_class){
        try{
            $sql = "UPDATE information SET system = ?, date = ? WHERE id_infor = {$id}";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $system_class->getSystem(), PDO::PARAM_STR);
            $insert->bindValue(2, $system_class->getDate(), PDO::PARAM_STR);
            
            $insert->execute();
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
