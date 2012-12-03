<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serialDAO
 *
 * @author Raphael
 */
class serialDAO extends PDO{
    private $action;
    public function __construct(){
        $this->action = new Core();
    }
    public function insertSerial($serial_class){
        try{
            $sql = "UPDATE information SET serial = ? WHERE id_infor = 1";
            $insert = $this->action->prepare($sql);
            $insert->bindValue(1, $serial_class->getSerial(), PDO::PARAM_STR);
            $insert->execute();
        }  catch (PDOException $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
