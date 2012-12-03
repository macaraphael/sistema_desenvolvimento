<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_profile
 *
 * @author Raphael
 */
class profile_class {
        public $name;
	public $user_name;
	public $pass;
	public $editor;
	
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function setUser_name($user_name){
		$this->user_name = $user_name;
	}
	public function getUser_name(){
		return $this->user_name;
	}
	public function setPass($pass){
		$this->pass = $pass;
	}
	public function getPass(){
		return $this->pass;
	}
	public function setEditor($editor){
		$this->editor = $editor;
	}
	public function getEditor(){
		return $this->editor;
	}
}

?>
