<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of access
 *
 * @author Raphael
 */
class access {
    public $id_user;
    public $text;
    public $toke;
    
    public function getId_user() {
        return $this->id_user;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }
    
    public function getToke(){
        return $this->toke;
    }
    
    public function setToke($toke){
        $this->toke = $toke;
    }
}

?>
