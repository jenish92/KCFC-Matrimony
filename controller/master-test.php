<?php
$root = getenv("DOCUMENT_ROOT");
require_once $root."/kcfc/matrimony/lib/db-connections.php";
require_once $root."/kcfc/matrimony/lib/Master.php";

// Get database connection
$database = new Database();
$db = $database->getConnection();

$table = "";

//Possible Table Names
/*blood
bodyType
complex
caste
subCaste
masritalStatus
natchathiram
rasi*/
// Initialize user object
$master = new Master($db);

$params = array();

// For all values, the params should be empty array
// For a single value, teh params contains a single value in array
// For subCaste and natchathiram, params should contain first paramter as its parent key Ex. Caste or Rasi

$blood = $master->MasterTable($table,$params);

print_r($blood);

?>