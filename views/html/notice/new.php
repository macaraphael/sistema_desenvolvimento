<div id="top">
    <img src="media/dialog-warning.png" border="0" />
    <h1><?php echo $notice['title']; ?></h1>
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
            foreach($noticeDAO->userNotice($_SESSION['iduser']) as $resUserWarnings){
                echo '<option value="'.$resUserWarnings[0].'">'.$resUserWarnings[1].'</option>';
            }
            ?>
        </select>
    </label>    
    <label>
        <span>Mensagem</span>
        <textarea name="msn" rows="14" cols="67"></textarea>
    </label>
</form>