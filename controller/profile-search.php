<?php 
    require_once("../lib/variables.php");  
    require_once ("../lib/db-connections.php");
    require_once("../lib/Profile.php");
    $database = new Database();
    $db = $database->getConnection();
    $profile = new Profile($db);  
    


    $filter = array();

    $filter["age"] = "18-30";
    $filter["gender"] = "1";
    $filter["religion"] = "1";
    
    $profileList = $profile->ProfileLists($filter);

var_dump($profileList);

?>