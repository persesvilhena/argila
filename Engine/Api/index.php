<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
define('__ROOT__', dirname(substr($_SERVER['SCRIPT_FILENAME'], 0, -9))."/");
require_once(__ROOT__.'Core/Core.php');
\Argila\Engine\Core::run();
?>