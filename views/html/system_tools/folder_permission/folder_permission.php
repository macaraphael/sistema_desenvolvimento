<fieldset class="campo_alteracoes">
    <?php
    //Cache
    if(is_writable('cache')){
        echo "<label class=\"ok_system_tools\"><span>Cache: <b>{$system_tools['can_write']}</b></label>";
    }else{
        echo "<label class=\"erro_system_tools\"><span>Cache: <b>{$system_tools['can_not_write']}</b></label>";
    }
    
    //tmp
    if(is_writable('tmp')){
        echo "<label class=\"ok_system_tools\"><span>Tmp: <b>{$system_tools["can_write"]}</b></label>";
    }else{
        echo "<label class=\"erro_system_tools\"><span>Tmp: <b>{$system_tools["can_not_write"]}</b></label>";
    }
    
    //Logs
    if(is_writable('logs')){
        echo "<label class=\"ok_system_tools\"><span>Logs: <b>{$system_tools["can_write"]}</b></label>";
    }else{
        echo "<label class=\"erro_system_tools\"><span>Logs: <b>{$system_tools["can_not_write"]}</b></label>";
    }
    ?>
</fieldset>