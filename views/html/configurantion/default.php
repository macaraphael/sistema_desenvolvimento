<div id="top">
    <img src="media/configuration.png" border="0" />
    <h1><?php echo $configurantion['title']; ?></h1>
</div>

<form action="" method="post">

    <?php
    include 'action/ac_tools.php';
    ?>
    <div class="separar_tabs"></div>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1" title="<?php echo $configurantion['basic_explanation']; ?>"><?php echo $configurantion['basic']; ?></a></li>
            <li><a href="#tabs-2" title="<?php echo $configurantion['system_explanation']; ?>"><?php echo $configurantion['system']; ?></a></li>
            <li><a href="#tabs-3" title="<?php echo $configurantion['email_explanation']; ?>"><?php echo $configurantion['email']; ?></a></li>
            <li><a href="#tabs-4" title="<?php echo $configurantion['base_explanation']; ?>"><?php echo $configurantion['base']; ?></a></li>
            <li><a href="#tabs-5" title="<?php echo $configurantion['backup_explanation']; ?>"><?php echo $configurantion['backup']; ?></a></li>
            <!--<li><a href="#tabs-4">w</a></li>-->
        </ul>
        <div id="tabs-1">
            <?php
            include 'views/html/configurantion/basic/basic.php';
            ?>
        </div>
        <div id="tabs-2">
            <?php
            include 'views/html/configurantion/system/system.php';
            ?>
        </div>
        <div id="tabs-3">
            <?php
            include 'views/html/configurantion/email/email.php';
            ?>
        </div>
        <div id="tabs-4">
            <?php
            include 'views/html/configurantion/base/base.php';
            ?>
        </div>
        <div id="tabs-5">
            <?php
            include 'views/html/configurantion/backup/backup.php';
            ?>
        </div>
    </div>
    
</form>