<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Urls{
        public function ViewAllUrl(){
            $protocolo    = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false) ? 'http' : 'https';
            $host         = $_SERVER['HTTP_HOST'];
            $script       = $_SERVER['SCRIPT_NAME'];
            $parametros   = $_SERVER['QUERY_STRING'];
            $UrlAtual     = $protocolo . '://' . $host . $script . '?' . $parametros;
            return $UrlAtual;
        }
    }

?>
