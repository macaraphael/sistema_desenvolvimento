<?php
if(isset($_POST['search']) && isset($_POST['searchhidden'])){
    if($userDAO->searchCountUser($_POST['search']) != 0){
        foreach($userDAO->searchPagination($_POST['search'],'id_user', $first, $quantity) as $resUserDAO){
            echo
            '<tr cellspacing="0">';

            if($resUserDAO[0] == $_SESSION['iduser']){
                echo '<td><input type="checkbox" name="userSelect[]" value="'.$resUserDAO[0].'" disabled="disabled" /></td>';
            }else{
                echo '<td><input type="checkbox" name="userSelect[]" value="'.$resUserDAO[0].'" /></td>';
            }

                echo '
                <td style="text-align:center">
                    '.$resUserDAO[0].'
                </td>';

            if($resUserDAO[0] != $_SESSION['iduser']){
                echo '<td>
                    <a href="index.php?option=user&action=edit&id='.$resUserDAO[0].'" title="Editar: '.$resUserDAO[1].'">
                        '.$resUserDAO[1].'
                    </a>
                 </td>';
            }else{
                echo '<td>'.$resUserDAO[1].'</td>';
            }


            if($resUserDAO[5] == 1){
                echo '<td>Administrador</td>';
            }
            if($resUserDAO[5] == 0){
                echo '<td>Usuário</td>';
            }
            if($resUserDAO[6] == 1 && $resUserDAO[0] != $_SESSION['iduser']){
                echo '<td style="text-align:center">
                        <a href="index.php?option=user&action=disable&id='.$resUserDAO[0].'" title="'.$user['disable'].$resUserDAO[1].'">
                            <img src="media/enable.png">
                        </a>
                </td>';
            }elseif($resUserDAO[0] == $_SESSION['iduser']){
                echo '<td style="text-align:center">
                            <img src="media/enable.png">
                </td>';
            }else{
                echo '<td style="text-align:center">
                    <a href="index.php?option=user&action=enable&id='.$resUserDAO[0].'" title="'.$user['enable'].$resUserDAO[1].'">
                        <img src="media/disable.png">
                    </a>
                </td>';
            }

            echo '</tr>';
        }
    }else{
        echo "<div class=\"erro_view\"><span class=\"erro_view_text\">{$user['consultation_sql']}</span></div>";
    }
}else{
    foreach($systemDAO->pagination('user', 'id_user', $first, $quantity) as $resUserDAO){
        echo
        '<tr cellspacing="0">';

        if($resUserDAO[0] == $_SESSION['iduser']){
            echo '<td><input type="checkbox" name="userSelect[]" value="'.$resUserDAO[0].'" disabled="disabled" /></td>';
        }else{
            echo '<td><input type="checkbox" name="userSelect[]" value="'.$resUserDAO[0].'" /></td>';
        }

            echo '
            <td style="text-align:center">
                '.$resUserDAO[0].'
            </td>';

        if($resUserDAO[0] != $_SESSION['iduser']){
            echo '<td>
                <a href="index.php?option=user&action=edit&id='.$resUserDAO[0].'" title="Editar: '.$resUserDAO[1].'">
                    '.$resUserDAO[1].'
                </a>
             </td>';
        }else{
            echo '<td>'.$resUserDAO[1].'</td>';
        }


        if($resUserDAO[5] == 1){
            echo '<td>Administrador</td>';
        }
        if($resUserDAO[5] == 0){
            echo '<td>Usuário</td>';
        }
        if($resUserDAO[6] == 1 && $resUserDAO[0] != $_SESSION['iduser']){
            echo '<td style="text-align:center">
                    <a href="index.php?option=user&action=disable&id='.$resUserDAO[0].'" title="'.$user['disable'].$resUserDAO[1].'">
                        <img src="media/enable.png">
                    </a>
            </td>';
        }elseif($resUserDAO[0] == $_SESSION['iduser']){
            echo '<td style="text-align:center">
                        <img src="media/enable.png">
            </td>';
        }else{
            echo '<td style="text-align:center">
                <a href="index.php?option=user&action=enable&id='.$resUserDAO[0].'" title="'.$user['enable'].$resUserDAO[1].'">
                    <img src="media/disable.png">
                </a>
            </td>';
        }

        echo '</tr>';
    }
}