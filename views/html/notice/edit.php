<div id="top">
    <img src="media/dialog-warning.png" border="0" />
    <h1><?php echo $notice['title_edit']; ?></h1>
</div>

<form action="" method="post">
    
    <?php
    include 'action/ac_tools.php';
    ?>
    
    <label>
        <span>Usuários</span>
        <select name="user">
            <option value="0" selected>Selecione um usuário</option>
            <?php
            foreach($noticeDAO->userNotice($_SESSION['iduser']) as $resUserNotice){
                $selected = null;
                if($resUserNotice[0] == $resNotice[2]){
                    $selected = "selected";
                }
                echo "<option value=\"{$resUserNotice[0]}\" {$selected}>{$resUserNotice[1]}</option>";
            }
            ?>
        </select>
    </label>    
    <label>
        <span>Mensagem</span>
        <textarea name="msn" rows="14" cols="67"><?php echo $resNotice[3]; ?></textarea>
    </label>
</form>