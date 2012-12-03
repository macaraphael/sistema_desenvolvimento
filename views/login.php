<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login - <?php echo $SConfig->systemname; ?></title>
        <link href="views/favicon.ico" rel="shortcut icon" />
        <?php
        //Incluindo css
        include 'views/css/includeCssLogin.php';
        //Incluindo JAVASCRIPT
        include 'views/js/includeLogin.php';
        ?>
        
    </head>
    <body>
        
        <div class="line"></div>
        
        <div id="box">
            <div class="top">
                <img src="views/img/logo.png" border="0" />
            </div>
            
            <div id="conteudo-geral">
                <div class="form">
                    <fieldset>
                        <legend><?php echo $login['title']; ?></legend>
                        <?php 
                        if(@$error == true)
                            echo '<label class="error_msn">'.$erro['erro_login'].'</label>';
                        if(@$errorloginaccess == true)
                            echo '<label class="error_msn">'.$erro['erro_access'].'</label>';
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" id="login">
                            <label>
                                <span><?php echo $login['user']; ?></span>
                                <input type="text" name="user" <?php if(@$error == true){ echo 'class="error"'; }?> />
                            </label>
                            <label>
                                <span><?php echo $login['password']; ?></span>
                                <input type="password" name="pass" <?php if(@$error == true){ echo 'class="error"'; }?> />
                            </label>
                            <input type="submit" class="btn" value="<?php echo $login['login']; ?>" name="login" />
                        </form>
                    </fieldset>
                </div>
            </div>
            
        </div>
        
        <div id="line-bottom">
            <div class="block"></div>
            <span class="assinatura">&COPY;2012-2012. Raphael Desenvolvimentos. Todos os direitos resevados.</span>
        </div>
        
    </body>
</html>
