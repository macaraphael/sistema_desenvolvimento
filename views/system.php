<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $SConfig->systemname; ?></title>
        <link href="views/favicon.ico" rel="shortcut icon" />
        
        <?php
            include 'views/css/includeCssSystem.php';
            include 'views/js/includeSystem.php';
        ?>
        
    </head>
    <body onload="Start();">
        <?php
        if($systemDAO->retriction($_SESSION['iduser']) != 0 && $systemDAO->checkCod(INFORMATION) != 0){
        ?>
            <div id="system_tools">
                <a href="index.php?option=system_tools">
                    <b><?php echo $system['system_tools']; ?></b>
                </a>
            </div>
        <?php
        }
        ?>
        
        <?php
        if($systemDAO->checkCod(INFORMATION)){
        ?>
            <div id="help">
                <a href="#" onclick="popupHelp()" title="<?php echo $system['help_system']; ?>">
                    <b><?php echo $system['help_system']; ?></b>
                </a>
            </div>
        <?php
        }
        ?>
        
        <div class="line"></div>
        
        <div id="contador">
            <img src="media/time.png" border="0" />
            <span><?php echo $system['time']; ?></span><div id="tempo"></div>
        </div>
        
        <div id="box">
            <div class="top">
                <img src="views/img/logo.png" border="0" />
            </div>
            <div class="exit">
                <a href="action/ac_logoff.php" title="logoff" alt="logoff" />
                    <img src="media/exit.png" border="0" title="Logoff" />
                </a>
            </div>
            
            <?php
               if($systemDAO->checkCod(INFORMATION) != 0){
                   include 'views/block/blo_menu.php';
               }
            ?>
            
            <?php
            include 'views/block/blo_sidebar.php';
            ?>
            
            <div id="conteudo-geral">
                <?php
                include 'views/block/blo_select_content.php';
                ?>
            </div>
            
        </div>
        
        <div id="line-bottom">
            <div class="block"></div>
            <span class="assinatura">&COPY;2012-2012. Raphael Desenvolvimentos. Todos os direitos resevados.</span>
        </div>
        
    </body>
</html>