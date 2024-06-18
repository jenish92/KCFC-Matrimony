<?php

$root = getenv("DOCUMENT_ROOT");
require_once $root."/kcfc/matrimony/lib/db-connections.php";
require_once $root."/kcfc/matrimony/lib/User.php";

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Initialize user object
$user = new User($db);

    $errors = [];
    /*$mobile = validateInput($_POST['mobile'], 'string', $errors, 'mobile');
    $religion = validateInput($_POST['religion'], 'int', $errors, 'religion');
    $district = validateInput($_POST['district'], 'int', $errors, 'district');
    $state = validateInput($_POST['state'], 'int', $errors, 'state');
    $country = validateInput($_POST['country'], 'int', $errors, 'country');*/
    
    $mobile = $user->validateInput('7010925155', 'string', $errors, 'mobile');
    $religion = $user->validateInput('5', 'int', $errors, 'religion');
    $district = $user->validateInput('27', 'int', $errors, 'district');
    $state = $user->validateInput('18', 'int', $errors, 'state');
    $country = $user->validateInput('IND', 'string', $errors, 'country');
    
    if (empty($errors)) {
        $i = array();
        $i["mobile"] = $mobile;
        $i["religion"] = $religion;
        $i["district"] = $district;
        $i["state"] = $state;
        $i["country"] = $country;
        $i["user_id"] = 1;
        $userProfile = $user->profileUpdate('basic',$i);
        
        echo $userProfile;
        
    // Process the validated data
} else {
    foreach ($errors as $field => $error) {
        echo "<p>$field -- $error</p>";
    }
}

    // Close the database connection
    $db->close();