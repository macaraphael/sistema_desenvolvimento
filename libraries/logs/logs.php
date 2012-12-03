<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logs
 *
 * @author Raphael
 */
class logs {
    //Metodos para receber o arquivo
    private $file;
    private $fopen;
    
    public function write($message, $file, $line){
        //Cria pasta
        @mkdir('logs');
        $file = SDIRECTORY.'/logs/log.txt';
        $fopen = fopen($file, 'w+');
                
        //Escrevendo o arquivo
        $data = date('d/m/Y g:i(s)a');
        fwrite($fopen, '------------------------------------------------------'.$data.'-------------------------------------------------');
        fwrite($fopen, "\nMessage: {$message}\n");
        fwrite($fopen, "File: {$file}\n");
        fwrite($fopen, "Line: {$line}\n");
        fwrite($fopen, '----------------------------------------------------------------------------------------------------------------------------');
    }
}

?>
