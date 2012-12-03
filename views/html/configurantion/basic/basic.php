<fieldset class="campo_alteracoes">
    <label>
        <span><?php echo $configurantion['system_name']; ?></span>
        <input type="text" name="system_name" value="<?php echo $SConfig->systemname; ?>" />
    </label>
    <label>
        <span><?php echo $configurantion['editor']; ?></span>
        <select name="editor">
            <option <?php if($resEditorList == 'no'){echo 'selected="selected"';} ?> value="no"><?php echo $configurantion['no_editor']; ?></option>
            <option <?php if($resEditorList == 'tiny_mce'){echo 'selected="selected"';} ?> value="tiny_mce"><?php echo $configurantion['tiny_mce']; ?></option>
        </select>
    </label>
</fieldset>