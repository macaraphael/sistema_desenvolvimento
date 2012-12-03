<?php
require 'model/mod_notice/notice.class.php';
require 'model/mod_notice/noticeDAO.php';

$noticeclass = new noticeclass();
$noticeDAO   = new noticeDAO();

if(@$_GET['action'] == 'new'){
    
    if(isset($_POST['salvar0']) || isset($_POST['salvar1'])){
        $user      = $_SESSION['iduser'];
        $to        = $_POST['user'];
        $msn       = $_POST['msn'];
        $date_time = date('d/m/Y=H:i(s)');
        
        $noticeclass->setFrom($user);
        $noticeclass->setTo($to);
        $noticeclass->setMsn($msn);
        $noticeclass->setDate_time($date_time);
        
        $noticeDAO->insertNotice($noticeclass);
    }
    
    include 'views/html/notice/new.php';
}elseif(@$_GET['action'] == 'edit'){
    
    if(isset($_GET['salvar0']) && isset($_GET['salvar1'])){
        $user      = $_SESSION['iduser'];
        $to        = $_POST['user'];
        $msn       = $_POST['msn'];
        $date_time = date('d/m/Y=H:i(s)');

        $noticeclass->setFrom($user);
        $noticeclass->setTo($to);
        $noticeclass->setMsn($msn);
        $noticeclass->setDate_time($date_time);

        $noticeDAO->updateNotice($noticeclass, $_GET['id']);
        
        if(isset($_GET['salvar1'])){
            header('Location: index.php?option=notice');
        }
    }
    
    foreach($noticeDAO->listNoticeId($_GET['id']) as $resNotice);   
    
    include 'views/html/notice/edit.php';
}else{
    include 'views/html/notice/default.php';
}