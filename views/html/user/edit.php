<div id="top">
    <img src="media/edit_user.png" border="0" />
    <h1><?php echo $user['edit_title'].$resUserAlterar[1];?></h1>
</div>
<form action="" method="post" id="my_profile">
    
    <?php
    include 'action/ac_tools.php';
    ?>
    
    <label>
        <span><?php echo $user['name'];?></span>
        <input type="text" name="name" value="<?php echo $resUserAlterar[1]; ?>" />
    </label>
    <label>
        <span><?php echo $user['user_name'];?></span>
        <input type="text" name="user_name" value="<?php echo $resUserAlterar[2]; ?>" />
    </label>
    <label>
        <span><?php echo $user['pass'];?></span>
        <input type="password" name="pass" />
    </label>
    <label>
        <span><?php echo $user['pass_conf'];?></span>
        <input type="password" name="conf_pass" />
    </label>
    
    <label>
        <span><?php echo $user['lavel_access']; ?></span>
        <select size="2" name="lavel">
            <option <?php if($resUserAlterar[5] == 1){echo 'selected="selected"';} ?> value="1"><?php echo $user['administrator']; ?></option>
            <option <?php if($resUserAlterar[5] == 0){echo 'selected="selected"';} ?> value="0"><?php echo $user['user']; ?></option>
        </select>
    </label>    
    
    <fieldset>
        <legend><?php echo $user['other_configurations']; ?></legend>
     <span><?php echo $user['editor']; ?></span>
        <select name="editor">
            <option <?php if($resUserAlterar[4] == 'no'){ echo 'selected="selected"';} ?> value="no"><?php echo $user['no_editor']; ?></option>
            <option <?php if($resUserAlterar[4] == 'standard'){ echo 'selected="selected"';} ?> value="standard"><?php echo $user['standard']; ?></option>
            <option <?php if($resUserAlterar[4] == 'tiny_mce'){ echo 'selected="selected"';} ?> value="tiny_mce"><?php echo $user['tiny_mce']; ?></option>
        </select>
    </fieldset>
</form>