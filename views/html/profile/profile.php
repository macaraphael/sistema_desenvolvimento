<div id="top">
    <img src="media/profile.png" border="0" />
    <h1><?php echo $my_profile['title'];?></h1>
</div>
<form action="" method="post" id="my_profile">
    
    <?php
    include 'action/ac_tools.php';
    ?>
    
    <label>
        <span><?php echo $my_profile['name'];?></span>
        <input type="text" name="name" value="<?php echo $nameComplet; ?>" />
    </label>
    <label>
        <span><?php echo $my_profile['user_name'];?></span>
        <input type="text" name="user_name" value="<?php echo $userNameComplet; ?>" />
    </label>
    <label>
        <span><?php echo $my_profile['pass'];?></span>
        <input type="password" name="pass" />
    </label>
    <label>
        <span><?php echo $my_profile['pass_conf'];?></span>
        <input type="password" name="conf_pass" />
    </label>
    
    
    <fieldset>
        <legend><?php echo $my_profile['other_configurations']; ?></legend>
     <span><?php echo $my_profile['editor']; ?></span>
        <select name="editor">
            <option <?php if($editorComplet == 'no'){ echo 'selected="selected"'; }?> value="no"><?php echo $my_profile['no_editor']; ?></option>
            <option <?php if($editorComplet == 'standard'){ echo 'selected="selected"'; }?> value="standard"><?php echo $my_profile['standard']; ?></option>
            <option <?php if($editorComplet == 'tiny_mce'){ echo 'selected="selected"'; }?> value="tiny_mce"><?php echo $my_profile['tiny_mce']; ?></option>
        </select>
    </fieldset>
</form>