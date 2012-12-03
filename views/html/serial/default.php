<div id="top">
    <img src="media/serial.png" border="0" />
    <h1><?php echo $serial['title_serial'];?></h1>
</div>
<form action="" method="post" id="validar">
    
    <?php
    require 'action/ac_tools.php';
    ?>
    <?php
        echo @$erro_serial;
    ?>
    <label>
        <span><?php echo $serial['serial'];?></span>
        <input type="text" style="width: 447px;" name="serial" />
    </label>
</form>