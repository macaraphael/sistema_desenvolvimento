<div id="top">
    <img src="media/system_tools.png" border="0" />
    <h1><?php echo $system_tools['title']; ?></h1>
</div>

<form action="" method="post">

    <?php
    include 'action/ac_tools.php';
    ?>
    <div class="separar_tabs"></div>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1" title="<?php echo $system_tools['folder_permission_explanation']; ?>"><?php echo $system_tools['folder_permission']; ?></a></li>
            <li><a href="#tabs-2" title="<?php echo $system_tools['cache_clear_explanation']; ?>"><?php echo $system_tools['cache_clear']; ?></a></li>
        </ul>
        <div id="tabs-1">
            <?php
            include 'views/html/system_tools/folder_permission/folder_permission.php';
            ?>
        </div>
        <div id="tabs-2">
            <?php
            include 'views/html/system_tools/cache_clear/cache_clear.php';
            ?>
        </div>
    </div>
    
</form>