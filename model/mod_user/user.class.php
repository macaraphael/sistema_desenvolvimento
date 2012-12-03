<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Raphael
 */
class user {
    public $id;
    public $disable_enable;
    public $name;
    public $user_name;
    public $lavel;
    public $pass;
    public $conf_pass;
    public $editor;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDisable_enable() {
        return $this->disable_enable;
    }

    public function setDisable_enable($disable_enable) {
        $this->disable_enable = $disable_enable;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    public function getLavel() {
        return $this->lavel;
    }

    public function setLavel($lavel) {
        $this->lavel = $lavel;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getConf_pass() {
        return $this->conf_pass;
    }

    public function setConf_pass($conf_pass) {
        $this->conf_pass = $conf_pass;
    }

    public function getEditor() {
        return $this->editor;
    }

    public function setEditor($editor) {
        $this->editor = $editor;
    }
}

?>
