<div id="tools">   
    <a href="javascript:history.back(-1)" title="<?php echo $tools['close']; ?>" class="close">
        <img src="media/no.png" border="0" />
    </a>
    <a href="index.php?option=<?php echo $_GET['option']; ?>&action=new" title="<?php echo $tools['new']; ?>" class="new">
        <img src="media/add.png" border="0" />
    </a>
    <?php
        if($systemDAO->retriction($_SESSION['iduser']) != 0){
            ?>
            <input type="submit" name="del" value="del" title="<?php echo $tools['edit']; ?>" class="del_toos_views" style="background: url(media/del-tools.png) no-repeat;"/>
            <?php
        }
    ?>
    <input type="hidden" name="tools_views" />
</div>