<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of noticeDAO
 *
 * @author Raphael
 */
class noticeDAO extends PDOException {
    private $action;
    public function __construct() {
        $this->action = new core();
    }
    public function listNoticeId($id){
        try{
            $sql = "SELECT * FROM notice WHERE id_notice = {$id}";
            $list = $this->action->query($sql);
            return $list;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function userNotice($user){
        try{
            $sql = "SELECT * FROM user WHERE id_user != '{$user}'";
            $list = $this->action->query($sql);
            return $list;
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function insertNotice($noticeclass){
        try{
            $sql = "INSERT INTO notice (fromnotice, tonotice, msn, date_time) VALUES (?, ?, ?, ?)";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $noticeclass->getFrom(), PDO::PARAM_STR);
            $insert->bindValue(2, $noticeclass->getTo(), PDO::PARAM_STR);
            $insert->bindValue(3, $noticeclass->getMsn(), PDO::PARAM_STR);
            $insert->bindValue(4, $noticeclass->getDate_time(), PDO::PARAM_STR);

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
    public function updateNotice($noticeclass, $id){
        try{
            $sql = "UPDATE notice SET fromnotice = ?, tonotice = ?, msn = ?, date_time = ? WHERE id_notice = {$id}";
            
            $update = $this->action->prepare($sql);
            
            $update->bindValue(1, $noticeclass->getFrom(), PDO::PARAM_STR);
            $update->bindValue(2, $noticeclass->getTo(), PDO::PARAM_STR);
            $update->bindValue(3, $noticeclass->getMsn(), PDO::PARAM_STR);
            $update->bindValue(4, $noticeclass->getDate_time(), PDO::PARAM_STR);
            
            $verificar = $update->execute();
            
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
    public function listNotice(){
        try{
            $sql = "select * from notice";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function listUserNotice($id_user){
        try{
            $sql = "select * from user where id_user = {$id_user}";
            $list = $this->action->query($sql);
            return $list;
        }catch(PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
