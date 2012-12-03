<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of toke
 *
 * @author Raphael
 */
class toke {
    //put your code here
    public function random(){
        $novo_valor= "";
        $valor = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ0123456789";
        srand((double)microtime()*1000000);
        for ($i=0; $i<4; $i++){
            $novo_valor.= $valor[rand()%strlen($valor)];
        }
        return $novo_valor;
    }
}

?>
