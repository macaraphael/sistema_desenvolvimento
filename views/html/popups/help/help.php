<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Halp System</title>
        <link href="../../views/css/popuphelp.css" rel="stylesheet" media="screen" type="text/css" />
    </head>
    <body>
        
        <div id="box_help">
            
            <div class="top">
                <img src="../../media/help.png" border="0" />
                <h1>Ajuda do sistema</h1>
            </div>
            
            <div class="form_search">
                <form action="" method="post">
                    <input type="text" value="<?php echo @$_POST['search']; ?>" name="search" />
                    <input type="submit" name="buscar" />
                    <input type="hidden" name="buscarhidden" />
                </form>
            </div>
            
            <hr />
            
            <div id="content">
                <?php
                if($poup_HelpDAO->countDataAllHelp() == 0){
                    echo "<span class=\"erro_no_halp\"><p>Não existe ajuda no momento!!</p></span>";
                }else{
                    if(!isset($_POST['buscar']) && !isset($_POST['buscarhidden'])){
                        foreach($poup_HelpDAO->listDateAllHelp() as $resHelp){
                            $count = strlen($resHelp[2]);
                            $count = $count - 1;
                            $referencia = $resHelp[2];
                            $mostrar = null;
                            $a = 0;
                            for($x = 0; $x <= $count; $x++){
                                $a++;
                                if($a == 1){
                                    $mostrar .= '<b>'.utf8_encode($referencia[$x]).'</b>';
                                }else{
                                    $mostrar .= '<span>'.utf8_encode($referencia[$x]).'</span>';
                                }
                            }

                            echo "<div id=\"top_title\"><span class=\"referencia\">{$mostrar}</span></div>";
                            echo "<div id=\"text\">{$resHelp[3]}</div>";
                            echo "<hr />";
                        }
                    }else{
                        if($poup_HelpDAO->countSearchDataAllHelp($_POST['search']) != 0){
                            foreach($poup_HelpDAO->searchDataAllHelp($_POST['search']) as $resHelp){
                                $count = strlen($resHelp[2]);
                                $count = $count - 1;
                                $referencia = $resHelp[2];
                                $mostrar = null;
                                $a = 0;
                                for($x = 0; $x <= $count; $x++){
                                    $a++;
                                    if($a == 1){
                                        $mostrar .= '<b>'.utf8_encode($referencia[$x]).'</b>';
                                    }else{
                                        $mostrar .= '<span>'.utf8_encode($referencia[$x]).'</span>';
                                    }
                                }

                                echo "<div id=\"top_title\"><span class=\"referencia\">{$mostrar}</span></div>";
                                echo "<div id=\"text\">{$resHelp[3]}</div>";
                                echo "<hr />";
                            }
                        }else{
                            echo "<span class=\"erro_no_halp\"><p>Não ha registros com esse nome!!</p></span>";
                        }
                    }
                }
                ?>
            </div>
            
        </div>
        
    </body>
</html>
