<div id="top">
    <img src="media/edit_user.png" border="0" />
    <h1><?php echo $user['title']; ?></h1>
</div>

<form action="" method="post">

    <?php
        require 'action/ac_tools_views.php';
        require 'action/ac_search.php';
    ?>

    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <th style="width: 10px;" align="center"><?php echo $user['select']; ?></th>
            <th style="width: 47px;" align="center"><?php echo $user['cod']; ?></th>
            <th style="width: 591px;" align="center"><?php echo $user['name']; ?></th>
            <th style="width: 95px;" align="center"><?php echo $user['level']; ?></th>
            <th style="width: 47px;" align="center"><?php echo $user['access']; ?></th>
        </thead>
        <tbody>
            <?php
            include 'views/html/user/block/action.php';
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
            echo '<a href="index.php?option=user&page='.$i.'">'.$i.'</a>';
    }
    ?>
</div>