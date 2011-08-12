<?php
// Path to application directory
defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH',
			realpath(dirname(__FILE__) . '/../application'));

// Path to library directory
defined('LIBRARY_PATH')
	|| define('LIBRARY_PATH',
	        realpath(dirname(__FILE__) . '/../library'));

// Path to Zend Framework
defined('ZF_PATH')
	|| define('ZF_PATH',
	        realpath(LIBRARY_PATH . '/ZendFramework2/library'));

// Application environment
defined('APPLICATION_ENV')
	|| define('APPLICATION_ENV',
			(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
											: 'production'));

// Set include path
set_include_path(implode(PATH_SEPARATOR, array(ZF_PATH, LIBRARY_PATH, get_include_path())));

// Init config
require_once 'Zend/Config/Config.php';
$config = new Zend\Config\Config(include APPLICATION_PATH . '/configs/config.php');

// Init autoloader
require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory($config->autoload->toArray());

// PHP settings
foreach ($config->phpSettings as $key => $value) {
    ini_set($key, $value);
}

// Bootstrap
$bootstrap = new $config->bootstrap_class($config);
$bootstrap->execute();
