<?php
$root = getenv("DOCUMENT_ROOT");
require_once $root."/kcfc/matrimony/lib/db-connections.php";
require_once $root."/kcfc/matrimony/lib/User.php";

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Initialize user object
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['pswd'];

        if ($user->register()) {
            echo "Registration successful!";
        } else {
            echo "Registration failed.";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $user->email = $_POST['email'];
        $user->password = md5($_POST['pswd']);
        
        if ($user->login()) {
            echo "Login successful!";
        } else {
            echo "<br>Login failed.";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] === 'forgot_password') {
        // Implement forgot password logic
        $user->email = $_POST['email'];

    // Check if email exists
        $userData = $user->getUserByEmail($email);
        if ($userData) {
            $token = bin2hex(random_bytes(16));
            if ($user->storeResetToken($userData['id'], $token)) {
                // Send the reset token via email
                $resetLink = "https://yourwebsite.com/reset_password.php?token=" . $token;
                mail($email, "Password Reset Request", "Click here to reset your password: " . $resetLink);

                echo "Password reset link has been sent to your email.";
            } else {
                echo "Failed to generate reset token.";
            }
        } else {
            echo "Email does not exist.";
        }

    // Close the database connection
        $db->close();
    }
    

if (isset($_POST['action']) && $_POST['action'] === 'reset_password') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];


    // Validate the token
    $userData = $user->getUserByToken($token);
    if ($userData) {
        // Update the password
        if ($user->updatePassword($userData['id'], $new_password)) {
            // Delete the reset token
            $user->deleteResetToken($userData['id']);

            echo "Password has been reset successfully.";
        } else {
            echo "Failed to reset the password.";
        }
    } else {
        echo "Invalid or expired token.";
    }

    // Close the database connection
    $db->close();
}
    
    
    
if (isset($_POST['action']) && $_POST['action'] === 'basic') {
    $errors = [];
    /*$mobile = validateInput($_POST['mobile'], 'string', $errors, 'mobile');
    $religion = validateInput($_POST['religion'], 'int', $errors, 'religion');
    $district = validateInput($_POST['district'], 'int', $errors, 'district');
    $state = validateInput($_POST['state'], 'int', $errors, 'state');
    $country = validateInput($_POST['country'], 'int', $errors, 'country');*/
    
    $mobile = validateInput('7010925155', 'string', $errors, 'mobile');
    $religion = validateInput('5', 'int', $errors, 'religion');
    $district = validateInput('27', 'int', $errors, 'district');
    $state = validateInput('18', 'int', $errors, 'state');
    $country = validateInput('IND', 'int', $errors, 'country');
    
    if (empty($errors)) {
        $i = array();
        $i["mobile"] = $mobile;
        $i["religion"] = $religion;
        $i["district"] = $district;
        $i["state"] = $state;
        $i["country"] = $country;
        $i["user_id"] = $_SESSION["user_id"];
        $userProfile = $user->profileUpdate('basic',$i);
        
        echo $userProfile;
        
    // Process the validated data
} else {
    foreach ($errors as $field => $error) {
        echo "<p>$error</p>";
    }
}

    // Close the database connection
    $db->close();
}    
    
    
    
}
?>