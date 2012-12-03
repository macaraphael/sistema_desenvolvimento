<fieldset class="campo_alteracoes">
    <label class="cache">
        <?php
        if($temarquivo != false){
        ?>
            <span>
                <a href="index.php?option=system_tools&action=cache_clear" title="Limpar Cache" />
                    <img src="media/cache.png" border="0" />
                    <b><?php echo $system_tools['cache_clear']; ?></b>
                </a>
            </span>
        <?php
        }else{
        ?>
            <span>
                <img src="media/cache.png" border="0" />
                <b><?php echo $system_tools['no_cache']; ?></b>
            </span>
        <?php
        }
        ?>
    </label>
</fieldset>