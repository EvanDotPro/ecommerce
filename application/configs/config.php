<?php
$c = array();
$c['autoload']['Zend\Loader\StandardAutoloader']['namespaces']['Core']  = APPLICATION_PATH . '/Core';
$c['autoload']['Zend\Loader\ClassMapAutoloader'][0]['Bootstrap']        = APPLICATION_PATH . '/Bootstrap.php';

$c['phpSettings']['display_startup_errors'] = 1;
$c['phpSettings']['display_errors']         = 1;
$c['phpSettings']['error_reporting']        = (E_ALL | E_STRICT);
$c['bootstrap_class']                       = 'Bootstrap';

$c['di'] = array();

return $c;
