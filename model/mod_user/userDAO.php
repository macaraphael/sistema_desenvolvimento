<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userDAO
 *
 * @author Raphael
 */
class userDAO extends PDO{
    public $action;
    public function __construct() {
        $this->action = new core();
    }
    public function ListDateUser(){
        try{
            $sql = "select * from user";
            $list = $this->action->query($sql);
            return $list;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function userId($id){
        try{
            $sql = "select * from user where id_user = {$id}";
            $list = $this->action->query($sql);
            return $list;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function disable_enable($userclass, $id){
        try{
            $sql = "update user set disable_enable = ? where id_user = {$id}";
            
            $update = $this->action->prepare($sql);
            
            $update->bindValue(1, $userclass->getDisable_enable(), PDO::PARAM_INT);
            
            $update->execute();
            
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function insertUser($userclass){
        try{
            $sql = "insert into user (name, user_name, password, editor, level, disable_enable) values (?, ?, ?, ?, ?, ?)";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $userclass->getName(), PDO::PARAM_STR);
            $insert->bindValue(2, $userclass->getUser_name(), PDO::PARAM_STR);
            $insert->bindValue(3, $userclass->getPass(), PDO::PARAM_STR);
            $insert->bindValue(4, $userclass->getEditor(), PDO::PARAM_STR);
            $insert->bindValue(5, $userclass->getLavel(), PDO::PARAM_STR);
            $insert->bindValue(6, $userclass->getDisable_enable(), PDO::PARAM_STR);
                    
            $verificar = $insert->execute();        
            
            if($verificar === true){
                echo "<script>window.alert('Salvo com sucesso')</script>";
            }else{
                echo "<script>window.alert('Erro ao Salvar')</script>";
            }
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function delUser($iduser){
        try{
            $sql = "DELETE FROM user WHERE id_user = {$iduser}";
            $del = $this->action->query($sql);
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function updateUser($userclass, $id){
        try{
            $sql = "UPDATE user SET name = ?, user_name = ?, password = ?, editor = ?, lavel = ? WHERE id_user = {$id}";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $userclass->getName(), PDO::PARAM_STR);
            $insert->bindValue(2, $userclass->getUser_name(), PDO::PARAM_STR);
            $insert->bindValue(3, $userclass->getPass(), PDO::PARAM_STR);
            $insert->bindValue(4, $userclass->getEditor(), PDO::PARAM_STR);
            $insert->bindValue(5, $userclass->getLavel(), PDO::PARAM_STR);
                    
            $verificar = $insert->execute();        
            
            if($verificar === true){
                echo "<script>window.alert('Salvo com sucesso')</script>";
            }else{
                echo "<script>window.alert('Erro ao Salvar')</script>";
            }
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function verifyExistenceUser($user){
        try{
            $sql   = "SELECT * FROM user WHERE user_name = '{$user}'";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function searchUser($search){
        try{
            $sql  = "SELECT * FROM user WHERE name LIKE '%{$search}%' OR user_name LIKE '%{$search}%' OR id_user LIKE '%{$search}%'";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function searchCountUser($search){
        try{
            $sql   = "SELECT * FROM user WHERE name LIKE '%{$search}%' OR user_name LIKE '%{$search}%' OR id_user LIKE '%{$search}%'";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function searchPagination($search, $order_by, $first, $quantity){
        try{
            $sql  = "SELECT * FROM user WHERE name LIKE '%{$search}%' OR user_name LIKE '%{$search}%' OR id_user LIKE '%{$search}%' ORDER BY {$order_by} ASC LIMIT {$first}, {$quantity}";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
