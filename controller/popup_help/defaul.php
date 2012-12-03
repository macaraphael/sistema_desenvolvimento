<?php
//Inportando bibliotecas e o core
require '../../config.php';
require '../../libraries/core/core.php';

require '../../model/mod_popup_help/popup_helpDAO.php';
$poup_HelpDAO = new popup_helpDAO;

include ('../../views/html/popups/help/help.php');