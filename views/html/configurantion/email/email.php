<fieldset class="campo_alteracoes">
    <label>
        <span>Endereço do servidor: </span>
        <input type="text" name="end_servidor" value="<?php echo $SConfig->host_email ?>" />
    </label>
    <label>
        <span>Porta de acesso: </span>
        <input type="text" name="port_access" value="<?php echo $SConfig->port_access; ?>" />
    </label>
    <label>
        <span>Usuário de acesso ao servidor: </span>
        <input type="text" name="user_email" value="<?php echo $SConfig->user_email; ?>" />
    </label>
    <label>
        <span>Senha de acesso ao servidor: </span>
        <input type="password" name="pass_email" value="<?php echo $SConfig->pass_email; ?>" />
    </label>
</fieldset>