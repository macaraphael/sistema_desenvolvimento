<div id="top">
    <img src="media/install.png" border="0" />
    <h1><?php echo $my_profile['title'];?></h1>
</div>
<form action="" method="post" id="installation" enctype="multipart/form-data">
    
    <?php
    include 'action/ac_tools_simple.php';
    ?>
    
    <label>
        <span>Instalação</span>
        <input type="file" name="fileInstallation" />
    </label>
    
</form>