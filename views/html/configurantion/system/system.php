<fieldset class="campo_alteracoes">
    <label>
        <span><?php echo $configurantion['cache_css']; ?></span>
    </label>
    <input <?php if($resCacheCss == '0'){ echo 'checked="checked"';} ?> type="radio" name="cache_css" value="0" ><?php echo $configurantion['no_system']; ?>
    <input <?php if($resCacheCss == '1'){ echo 'checked="checked"';} ?> type="radio" name="cache_css" value="1" ><?php echo $configurantion['yes_system']; ?>
    <label>
        <span><?php echo $configurantion['compression_css']; ?></span>
    </label>
    <input <?php if($resCompreCss == '0'){ echo 'checked="checked"';} ?> type="radio" name="compression_css" value="0" ><?php echo $configurantion['no_system']; ?>
    <input <?php if($resCompreCss == '1'){ echo 'checked="checked"';} ?> type="radio" name="compression_css" value="1" ><?php echo $configurantion['yes_system']; ?>
    <label>
        <span><?php echo $configurantion['time_session']; ?></span>
        <input type="text" name="time_session" size="4" value="<?php echo $resSessionTime; ?>" />
    </label>
</fieldset>