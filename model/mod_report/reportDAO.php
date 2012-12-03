<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportDAO
 *
 * @author Raphael
 */
class reportDAO extends PDOException{
    //put your code here
    private $action;
    public function __construct() {
        $this->action = new core();
    }
    public function listDate($tabela){
        $sql    = "SELECT * FROM {$tabela}";
        $insert = $this->action->query($sql);
        return $insert;
    }
}