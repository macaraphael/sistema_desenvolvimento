<fieldset class="campo_alteracoes">
    <label>
        <span><?php echo $configurantion['typedb']; ?></span>
        <input type="text" name="typedb" value="<?php echo $SConfig->typedb; ?>" />
    </label>
    <label>
        <span><?php echo $configurantion['name_data_base']; ?></span>
        <input type="text" name="dbname" value="<?php echo $SConfig->dbname; ?>" />
    </label>
    <label>
        <span><?php echo $configurantion['host_data_base']; ?></span>
        <input type="text" name="host" value="<?php echo $SConfig->host; ?>" />
    </label>
    <label>
        <span><?php echo $configurantion['user_data_base']; ?></span>
        <input type="text" name="user" value="<?php echo $SConfig->user; ?>" />
    </label>
    <label>
        <span><?php echo $configurantion['pass_data_base']; ?></span>
        <input type="password" name="pass" value="<?php echo $SConfig->pass; ?>" />
    </label>
</fieldset>