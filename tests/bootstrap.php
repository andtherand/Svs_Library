<?php

set_include_path(implode(PATH_SEPARATOR, array(
  	realpath(dirname(__FILE__) . '/../library'),
    realpath(dirname(__FILE__) . '/../tests/library'),
    get_include_path(),
)));

require_once 'Zend/Loader/Autoloader.php';
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Svs_');
