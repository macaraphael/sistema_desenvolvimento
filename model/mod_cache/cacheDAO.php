<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cacheDAO
 *
 * @author Raphael
 */
class cacheDAO extends PDO{
    //put your code here
    public $action;
    public function __construct() {
        $this->action = new core();
    }
    public function cacheCss(){
        try{
            $sql   = "select cache_css from configurantion where cache_css = 1";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function cacheCssCompress(){
        try{
            $sql   = "select compression_css from configurantion where compression_css = 1";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function cacheJs(){
        try{
            $sql   = "select cache_javascript from configurantion where cache_javascript = 1";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    public function cacheJsCompress(){
        try{
            $sql   = "select compression_javascript from configurantion where compression_javascript = 1";
            $list  = $this->action->query($sql);
            $count = $list->rowCount();
            return $count;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
