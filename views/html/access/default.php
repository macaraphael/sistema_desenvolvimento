<div id="top">
    <img src="media/edit_user.png" border="0" />
    <h1><?php echo $access['title']; ?></h1>
</div>

<form action="" method="post" name="myform">

    <?php
        require 'action/ac_tools_views_access.php';
    ?>

    <table border="0" cellspacing="0" cellpadding="0" >
        <thead>
        <th style="width: 10px;" align="center"><input type="checkbox" name="CheckAll" value="Check All" onclick="toggle(this)" /></th>
            <th style="width: 860px;" align="center"><?php echo $access['text'];?></th>
        </thead>
        <tbody>
            <?php
                $a = 0;
                foreach($accessDAO->paginationAccess('id_access', $first, $quantity) as $resAcesso){
                    $text  = $resAcesso[2];
                    $a++;
                    for($x = 0; $x <= 100; $x++){
                        @$textFinal .= $text[$x];
                    }
                    $textFinal .= '...';
                    echo '<tr><td align="center"><input type="checkbox" name="list[]" value="'.$resAcesso[0].'" /></td>';
                    echo "<td>{$textFinal}</td></tr>";
                }
                ?>
            
        </tbody>
    </table>
</form>

<div id="pagination">
    <?php
    for($i = 1; $i <= $totalPage; $i++){
        if($i == $page)
            echo '<span>'.$i.'</span>';
        else
            echo '<a href="index.php?option=access&page='.$i.'">'.$i.'</a>';
    }
    ?>
</div>