<fieldset class="campo_alteracoes">
    <?php $fileBackup = SDIRECTORY."/tmp/".md5('sistema').'.zip'; ?>
    <?php if(!is_file($fileBackup)){ ?>
        <div id="backup_system">
            <a href="index.php?option=configurantion&action=generate_backup" title="<?php echo $configurantion['generate_backup']; ?>">
                <img src="media/backup.png" border="0" title="<?php echo $configurantion['generate_backup']; ?>" /><b><?php echo $configurantion['generate_backup']; ?></b>
            </a>
        </div>
    <?php }elseif(is_file($fileBackup)){ ?>
        <div id="download_system">
            <a href="<?php echo "tmp/".md5('sistema').'.zip'; ?>" title="<?php echo $configurantion['file_backup']; ?>">
                <img src="media/application_zip.png" border="0" title="<?php echo $configurantion['file_backup']; ?>" />
            </a>
            <a href="<?php echo 'index.php?option=configurantion&action=del&file='.md5('sistema').'.zip'; ?>" title="<?php echo $configurantion['del_backup']; ?>">
                <img src="media/del.png" border="0" title="<?php echo $configurantion['del_backup']; ?>" />
            </a>
        </div>
    <?php } ?>
</fieldset>