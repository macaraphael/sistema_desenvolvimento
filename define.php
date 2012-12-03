<?php
/*Caminho do arquivo*/
define('SFULLPATH', __FILE__);
define('SDIRECTORY', dirname(__FILE__));
define('SDIRECTORYIMAGES', dirname(__FILE__).'/images');

$information = parse_ini_file('information.ini');

/*Informação do sistema*/
define('INFORMATION', $information['information']);