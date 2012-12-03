<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of configurationDAO
 *
 * @author Raphael
 */
class configurantionDAO extends core{
    //put your code here
    private $action;
    public function __construct(){
        $this->action = new core();
    }
    public function ListConfigurantion(){
        try{
            $sql = "select * from configurantion";
            $list = $this->action->query($sql);
            return $list;
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function insertConfigurantion($configurantion_class){
        try{
            $sql = "update configurantion set editor = ?, cache_css = ?, compression_css = ?,session_time = ?";
            
            $insert = $this->action->prepare($sql);
            
            $insert->bindValue(1, $configurantion_class->getEditor(), PDO::PARAM_STR);
            $insert->bindValue(2, $configurantion_class->getCache_css(), PDO::PARAM_STR);
            $insert->bindValue(3, $configurantion_class->getCompression_css(), PDO::PARAM_STR);
            $insert->bindValue(4, $configurantion_class->getSession_time(), PDO::PARAM_STR);
            
            $verificar = $insert->execute();
            if($verificar === true){
                echo "<script>window.alert('Salvo com sucesso')</script>";
            }else{
                echo "<script>window.alert('Erro ao Salvar')</script>";
            }
            
        }catch(Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
