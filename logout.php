<?php
session_start();
$root = getenv("DOCUMENT_ROOT");
require_once("lib/variables.php"); 

session_destroy();

header("Location: ".$base_url."login.php");

?>