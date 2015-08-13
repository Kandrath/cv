<?php
// Config ini
set_time_limit(-1);
// error_reporting(E_ALL ^ E_STRICT);

// Constants
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('REQUIRED', ROOT . 'required' . DIRECTORY_SEPARATOR);
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR);
define('VENDOR', ROOT . 'vendor' . DIRECTORY_SEPARATOR);

// require REQUIRED . 'conf.inc.php';
require VENDOR . 'autoload.php';

// Autoload
function PSR0_autoload($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require SRC . $fileName;
}
spl_autoload_register('PSR0_autoload');
