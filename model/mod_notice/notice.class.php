<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notice
 *
 * @author Raphael
 */
class noticeclass {
    //put your code here
    public $from;
    public $to;
    public $msn;
    public $date_time;
    
    public function getFrom() {
        return $this->from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function getMsn() {
        return $this->msn;
    }

    public function setMsn($msn) {
        $this->msn = $msn;
    }

    public function getDate_time() {
        return $this->date_time;
    }

    public function setDate_time($date_time) {
        $this->date_time = $date_time;
    }
}

?>
