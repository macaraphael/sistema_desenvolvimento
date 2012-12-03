<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * classe responsável por tratar os dados
 * @method type methodName(type $paramName) Description
 * @author Raphael
 */
class secrity {
    public function AntiSql($sql){
                $sql = @preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\|;)/"),"", $sql);

                $sql = trim($sql);
                $sql = strip_tags($sql);

                $sql = addslashes($sql);

                return $sql;
    }
    public function MD5($String){
        $end = md5($String);
        return $end;
    }
    public function base64Codificar($String){
        $end = base64_encode($String);
        return $end;
    }
    public function base64Decoficar($String){
        $end = base64_decode($String);
        return $end;
    }
    public function Crypt($String){
        $end = crypt($String);
        return $end;
    }
}

?>
