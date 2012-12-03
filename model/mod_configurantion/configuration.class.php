<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of configuration
 *
 * @author Raphael
 */
class configuration {
    //put your code here
    public $cache_css;
    public $compression_css;
    public $cache_javascript;
    public $compression_javascript;
    public $editor;
    public $session_time;
    
    public function getCache_css() {
        return $this->cache_css;
    }

    public function setCache_css($cache_css) {
        $this->cache_css = $cache_css;
    }

    public function getCompression_css() {
        return $this->compression_css;
    }

    public function setCompression_css($compression_css) {
        $this->compression_css = $compression_css;
    }

    public function getCache_javascript() {
        return $this->cache_javascript;
    }

    public function setCache_javascript($cache_javascript) {
        $this->cache_javascript = $cache_javascript;
    }

    public function getCompression_javascript() {
        return $this->compression_javascript;
    }

    public function setCompression_javascript($compression_javascript) {
        $this->compression_javascript = $compression_javascript;
    }

    public function getEditor() {
        return $this->editor;
    }

    public function setEditor($editor) {
        $this->editor = $editor;
    }
    
    public function getSession_time() {
        return $this->session_time;
    }

    public function setSession_time($session_time) {
        $this->session_time = $session_time;
    }
}

?>
