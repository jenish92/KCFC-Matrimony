<?php
$root = getenv("DOCUMENT_ROOT");
require_once $root."/kcfc/matrimony/lib/db-connections.php";
require_once $root."/kcfc/matrimony/lib/User.php";

$database = new Database();
$db = $database->getConnection();

// Initialize user object
$user = new User($db);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user->uploadDocuments('photo_1');
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        
        <input type="file" name="photo_1" id="photo_1">
        <button type="submit">Upload</button>
    
    </form>
</body>
</html>