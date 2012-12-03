<div id="top">
    <img src="media/dialog-warning.png" border="0" />
    <h1><?php echo $notice['title']; ?></h1>
</div>

<form action="" method="post"s>
    <?php
        require 'action/ac_tools_views.php';
        require 'action/ac_search.php';
    ?>
    
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <th><?php echo $notice['select']; ?></th>
            <th style="width: 47px;"><?php echo $notice['cod']; ?></th>
            <th style="width: 591px;"><?php echo $notice['msn']; ?></th>
            <th style="width: 127px;"><?php echo $notice['from']; ?></th>
            <th style="width: 127px;"><?php echo $notice['to']; ?></th>
            <th style="width: 95px;"><?php echo $notice['date']; ?></th>
            <th style="width: 97px;"><?php echo $notice['time']; ?></th>
        </thead>
        <tbody>
            <?php
            foreach($noticeDAO->listNotice() as $resListWarnings){
                foreach($noticeDAO->listUserNotice($resListWarnings[1]) as $resUserWarningsTo);
                foreach($noticeDAO->listUserNotice($resListWarnings[2]) as $resUserWarningsFrom);
                
                
                $limit = $secrity->AntiSql($resListWarnings[3]);
                
                //Contar
                $contLimit = count($limit);
                $viewlimit = null;
                for($x = 0; $x <= 100; $x++){
                    if(@$limit[$x] == null)
                        break;
                    $viewlimit .= $limit[$x];
                }
                $viewlimit .= '...';
                
                //Separar datas
                $separarDateTime = explode('=', $resListWarnings[4]);
                
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="warnings[]" value="<?php echo $resListWarnings[0]; ?>" />
                    </td>
                    <td>                    
                        <?php echo $resListWarnings[0]; ?>                    
                    </td>
                    <td>
                        <a href="index.php?option=notice&action=edit&id=<?php echo $resListWarnings[0]; ?>" title="<?php echo $notice['edit']; ?>">
                            <?php echo $viewlimit; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $resUserWarningsTo[1]; ?>
                    </td>
                    <td>
                        <?php echo $resUserWarningsFrom[1]; ?>
                    </td>
                    <td>
                        <?php echo $separarDateTime[0]; ?>
                    </td>
                    <td>
                        <?php echo $separarDateTime[1]; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    
    
</form>