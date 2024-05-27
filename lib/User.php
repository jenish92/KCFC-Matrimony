<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, email=:email, password=:password";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=password_hash($this->password, PASSWORD_BCRYPT);

        // Bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login() {
        $query = "SELECT id, login_id, email, password FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->username = $row['login_id'];
            $this->email = $row['email'];
            $password2 = $row['password'];

            if($this->password === $password2) {
                
                return true;
            }
        }
        return false;
    }

    public function forgotPassword() {
        // This method should handle the logic for password recovery,
        // such as generating a token and sending a reset link via email.
        // Implementation of this method depends on your specific requirements.
    }
    
    public function getCurrentPasswordHash($user_id) {
        $sql = "SELECT password FROM  " . $this->table_name . "  WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {
            return $hashed_password;
        } else {
            return false;
        }
    }

    public function updatePassword($user_id, $new_password) {
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE  " . $this->table_name . "  SET password = ? WHERE id = ?";
        $update_stmt = $this->conn->prepare($update_sql);
        $update_stmt->bind_param("si", $new_hashed_password, $user_id);

        return $update_stmt->execute();
    }
    
    public function getUserByEmail($email) {
        $sql = "SELECT id, email FROM  " . $this->table_name . "  WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function storeResetToken($user_id, $token) {
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
        $sql = "INSERT INTO password_resets (user_id, token, expiry) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE token = ?, expiry = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss", $user_id, $token, $expiry, $token, $expiry);
        return $stmt->execute();
    }

    public function getUserByToken($token) {
        $sql = "SELECT u.id, u.email FROM  " . $this->table_name . "  u INNER JOIN password_resets pr ON u.id = pr.user_id WHERE pr.token = ? AND pr.expiry > NOW()";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
     public function deleteResetToken($user_id) {
        $sql = "DELETE FROM password_resets WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        return $stmt->execute();
    }

    
    
}
?>
