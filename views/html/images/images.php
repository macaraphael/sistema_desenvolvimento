<div id="top">
    <img src="media/images.png" border="0" />
    <h1><?php echo $my_profile['title'];?></h1>
</div>
<form action="" method="post" id="installation" enctype="multipart/form-data">
    
    <?php
    include 'action/ac_tools_simple.php';
    if(isset($_GET['dir'])){
        $mostrarEndImg = $_GET['dir'];
    }elseif(isset($_SESSION['dir'])){
        $mostrarEndImg = $_SESSION['dir'];
    }
    ?>
    <div class="separar_img"></div>
    <label id="img_content">
        <div class="endereco">
            <span>Endereço: <?php if(isset($mostrarEndImg)){$end = "{$mostrarEndImg}";echo $end;} ?></span>
        </div>

        <?php
        include 'action/ac_list_folder_images.php';
        ?>
        
        <div class="create_folder">
            <input type="text" name="create_folder"/><input name="create" type="submit" class="create" value="criar">
        </div>
    </label>
    
    <label>
        <span>Instalação</span>
        <input type="file" name="fileInstallation" />
    </label>
    
</form>