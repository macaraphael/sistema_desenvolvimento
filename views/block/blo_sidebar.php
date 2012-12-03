<?php
require 'model/mod_sidebar/sidebarDAO.php';
$sidebarDAO = new sidebarDAO;
?>

<div id="sidebar">
    <fieldset>
        <legend><?php echo $sidebar['warnings']; ?></legend>
        <div class="aviso">
            <?php
            include 'action/ac_notice_sidebar.php';
            echo @$views_warnings;
            echo @$views_warnings_register;
            ?>
        </div>
    </fieldset>
    <?php 
    if($systemDAO->retriction($_SESSION['iduser']) != 0 && $systemDAO->checkCod(INFORMATION) != 0){
    ?>
        <fieldset>
            <legend><?php echo $sidebar['infor_access']; ?></legend>
            <div class="infor">
                <a href="index.php?option=access" title="<?php echo $sidebar['infor_access']; ?>">
                    <span>
                        <img src="media/access.png" border="0" title="<?php echo $sidebar['infor_access']; ?>"><b><?php echo $sidebar['infor_access']; ?></b>
                    </span>
                </a>
            </div>
        </fieldset>
    <?php
    }
    ?>
</div>