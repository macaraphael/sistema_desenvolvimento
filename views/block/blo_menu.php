<?php
$systemDAO = new systemDAO;
?>
<div id="cssmenu">
<ul>
   <li class="has-sub" ><a href="index.php?option=home"><span><?php echo $menu["home"]; ?></span></a>
      <ul>
         <li class="has-sub"><a href="index.php?option=my_profile"><span><?php echo $menu["my_profile"]; ?></span></a></li>
      </ul>
   </li>
    <?php 
    if($systemDAO->retriction($_SESSION['iduser']) != 0){
    ?>
        <li class="has-sub"><a href="index.php?option=configurantion"><span><?php echo $menu["configurantion"]; ?></span></a></li>
    <?php
    }
    if($systemDAO->retriction($_SESSION['iduser']) != 0){
    ?>
        <li class="has-sub"><a href="index.php?option=user"><span><?php echo $menu["user"]; ?></span></a></li>
    <?php
    }
    ?>
    <li class="has-sub"><a href="index.php?option=notice"><span><?php echo $menu["notice"]; ?></span></a></li>
    <?php
    if($systemDAO->retriction($_SESSION['iduser']) != 0){
    ?>
        <li class="has-sub"><a href="index.php?option=install"><span><?php echo $menu["install"]; ?></span></a></li>
    <?php
    }
    ?>
        <li class="has-sub"><a href="index.php?option=images"><span><?php echo $menu["images"]; ?></span></a></li>
</ul>
</div>