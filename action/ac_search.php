<div id="search">
        <input type="text" id="bSite" name="search" value="<?php if(isset($_POST['searchhidden'])){ echo $_POST['search'];} ?>" />
        <input type="submit" value="<?php echo $tools['button_search'];?>" style="background: url(media/search.png) no-repeat;" title="<?php echo $tools['button_search'];?>" />
        <input type="hidden" name="searchhidden"/>
</div>