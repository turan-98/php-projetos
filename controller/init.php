<?php 

//constantes com as credencias de acesso
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','bank');

//habilita todas as exibições de erros
ini_set('display_errors',true);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

require_once 'functions.php';

?>