<?php
include '../../define.php';
include '../../libraries/directory/directory.class.php';
$directoryOption = new directoryOption();

echo "<ul id=\"browser\" class=\"filetree treeview-famfamfam\">";

$directoryOption->listTree('imagens');

echo "</ ul>";