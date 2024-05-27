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
    
    
    
    
    
    
    
}
?>