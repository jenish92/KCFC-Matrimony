<?php

$root = getenv("DOCUMENT_ROOT");
$base_url = "http://localhost/kcfc/matrimony/";
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'kcfc/matrimony');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");

?>