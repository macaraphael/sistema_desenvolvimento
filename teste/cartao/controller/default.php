<?php
for($x = 0; $x <= 5; $x++){
    for($y = 0; $y <= 5; $y++){
        $a = $x;
        
        //calculo de cartão de toke
        $a = ($x*$x) + ($y);
        $b = ($y*$y) + ($x);
        
        if($a == 0){
            $a = $x+1;
        }
        
        if($b == 0){
            $b = $y+1; 
        }
        
        if($a <= 9){
            $a = "0{$a}";
        }
        if($b <= 9){
            $b = "0{$b}";
        }
        
        echo "|{$a}{$b}|";
    }
    echo "<br>";
}