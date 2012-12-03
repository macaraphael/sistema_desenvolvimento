<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Instalação</title>
        
        <link href="views/favicon.ico" rel="shortcut icon" />
        <link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
        <link href="font/stylesheet.css" rel="stylesheet" media="screen" type="text/css" />
        
        <?php
        require 'js/include.php';
        ?>
        
    </head>
    <body>
        
        <div id="top">
            <div class="content">Instalação</div>
        </div>
        <div id="line"></div>
        
        <form action="" method="post" id="installation" >
            <input type="submit" name="salvar" value="salvar" title="salvar" />
            
            <fieldset id="permissao">
                <legend>Permissões</legend>
                <?php
                    foreach($folder as $resFolder){
                        if(is_writable('../'.$resFolder) == true){
                            ?>
                            <label class="ok">
                                <span><?php echo $resFolder; ?>:<b>Possível escrever</b></span>
                            </label>
                            <?php
                        }
                        
                        if(is_writable('../'.$resFolder) == false){
                            ?>
                            <label class="erro">
                                <span><?php echo $resFolder; ?>:<b>Impossível escrever</b></span>
                            </label>
                            <?php
                        }
                    }
                ?>
            </fieldset>
            <fieldset>
                <legend>Sistema</legend>
                <label>
                    <span>Nome do sistema</span>
                    <input type="text" name="system_name" />
                </label>
            </fieldset>
            <fieldset>
                <legend>MySQL</legend>
                <label>
                    <span>Host do Banco: </span>
                    <input type="text" name="host_data_base" />
                </label>
                <label>
                    <span>Nome do banco: </span>
                    <input type="text" name="db_name" />
                </label>
                <label>
                    <span>Usuário: </span>
                    <input type="text" name="user_data_base" />
                </label>
                <label>
                    <span>Senha: </span>
                    <input type="password" name="pass_data_base" />
                </label>
            </fieldset>
            <fieldset>
                <legend>Servidor de e-mail</legend>
                <label>
                    <span>Host de e-mail: </span>
                    <input type="text" name="host_email" />
                </label>
                <label>
                    <span>Porta: </span>
                    <input type="text" name="port_access" />
                </label>
                <label>
                    <span>Usuário: </span>
                    <input type="text" name="user_email" />
                </label>
                <label>
                    <span>Senha: </span>
                    <input type="password" name="pass_email" />
                </label>
            </fieldset>
        
        </form>
        
    </body>
</html>
