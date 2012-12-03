<div id="top">
    <img src="media/edit_user.png" border="0" />
    <h1><?php echo $user['title_new'];?></h1>
</div>
<form action="" method="post" id="my_profile">
    
    <?php
    include 'action/ac_tools.php';
    ?>
    
    <label>
        <span><?php echo $user['name'];?></span>
        <input type="text" name="name" />
    </label>
    <label>
        <span><?php echo $user['user_name'];?></span>
        <input type="text" name="user_name" />
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
            <option value="1"><?php echo $user['administrator']; ?></option>
            <option value="0"><?php echo $user['user']; ?></option>
        </select>
    </label>    
    
    <fieldset>
        <legend><?php echo $user['other_configurations']; ?></legend>
     <span><?php echo $user['editor']; ?></span>
        <select name="editor">
            <option value="no"><?php echo $user['no_editor']; ?></option>
            <option value="standard"><?php echo $user['standard']; ?></option>
            <option value="tiny_mce"><?php echo $user['tiny_mce']; ?></option>
        </select>
    </fieldset>
</form>