<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $phone;
    public $date_of_birth;
    public $password;
    public $gender;
    public $country;
    public $state;
    public $district;
    public $user_exist = 0;
    
    private $previous_id;
    private $previous_login_id;
    
    public $valid_extensions;
    public $maxsize;
    public $base_url;

    public function __construct($db) {
        $this->conn = $db;
        date_default_timezone_set("Asia/Calcutta");
        session_start();
        $this->valid_extensions = array("jpg","jpeg","png","pdf","docx");
        $this->maxsize = 2 * 1024 * 1024;
        $this->base_url = "http://localhost/kcfc/matrimony/";
    }
    
    
    
    public function validateInput($input, $type, &$errors, $fieldName) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    switch ($type) {
        case 'string':
            $input = filter_var($input, FILTER_SANITIZE_STRING);
            if (empty($input)) {
                $errors[$fieldName] = ucfirst($fieldName) . " is required.";
            }
            break;

        case 'email':
            $input = filter_var($input, FILTER_SANITIZE_EMAIL);
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $errors[$fieldName] = "Invalid email format.";
            }
            break;

        case 'url':
            $input = filter_var($input, FILTER_SANITIZE_URL);
            if (!filter_var($input, FILTER_VALIDATE_URL)) {
                $errors[$fieldName] = "Invalid URL.";
            }
            break;

        case 'int':
            $input = filter_var($input, FILTER_VALIDATE_INT);
            if ($input === false) {
                $errors[$fieldName] = "Invalid integer.";
            }
            break;

        case 'float':
            $input = filter_var($input, FILTER_VALIDATE_FLOAT);
            if ($input === false) {
                $errors[$fieldName] = "Invalid float.";
            }
            break;

        case 'regex':
            if (!preg_match($fieldName, $input)) {
                $errors['custom'] = "Invalid input format.";
            }
            break;

        default:
            $errors[$fieldName] = "Invalid validation type.";
            break;
    }

    return $input;
}
    
    
    public function getLatest($email = ""){
        
        $where = "";
        
        if($email != ""){
            $where = " WHERE email = '$email'";
        }
        
       $query = "SELECT id, login_id FROM " . $this->table_name . $where." ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->previous_id = $row['id'];
            $this->previous_login_id = substr($row['login_id'],1);
            $this->user_exist = 1;
        }
        else{
            $this->user_exist = 0;
        }
    }
    
    

    public function register() {
        
        $this->getLatest();
        
        $new_login_id = "K".($this->previous_login_id + 1);
        
        $query = "INSERT INTO " . $this->table_name . " (login_id,email,mobile,dob,gender,country,state,district,password) VALUES (:login_id,:email,:phone,:dob,:gender,:country,:state,:district,:password)";
        $stmt = $this->conn->prepare($query);
    
        
        $this->password=md5($this->password);
        //$stmt->bind_param("ssssssiis", $this->login_id, $this->email, $this->phone, $this->date_of_birth, $this->gender,$this->country,$this->state,$this->district,$this->password);
        
        echo $new_login_id;
        
        // Bind values
        $stmt->bindParam(":login_id", $new_login_id);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":dob", $this->date_of_birth);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":district", $this->district);
        $stmt->bindParam(":password", $this->password);
        

        if($stmt->execute()) {
            $this->getLatest();
            $query = "INSERT INTO user_profiles (user_id) VALUES ($this->previous_id)";
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()) {
                $_SESSION["user_id"] = $this->id;
                error_log("\n\nFrom Registration : ".$_SESSION["user_id"],3,"sessionss.txt");
                return true;
            }
            else{
                return false;
            }
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
                $_SESSION["user_id"] = $this->id;
                error_log("\n\nFrom Login : ".$_SESSION["user_id"],3,"sessionss.txt");
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
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
    
    
    public function profileUpdate($profileCategory,$i){
        
        switch($profileCategory){
            case "basic":
                $update_sql = "UPDATE users SET mobile =:mobile, religion =:religion, district =:district, state =:state, country =:country WHERE id =:id";
                break;
                
            case "astro":
                $update_sql = "UPDATE user_profiles SET birth_hour =:birth_hour, birth_minute =:birth_minute, birth_sec =:birth_sec, birth_city =:birth_city, rasi =:rasi, natchathram =:natchathram WHERE id =:id";
                break;
                
            case "contact":
                $update_sql = "UPDATE user_profiles SET alternate_phone =:alternate_phone, alternate_email =:alternate_email, whatsapp =:whatsapp, contact_person_name =:contact_person_name, contact_person_number =:contact_person_number, contact_person_relation =:contact_person_relation, convenient_call_time =:convenient_call_time, address =:address WHERE id =:id";
                break;
                
            case "family":
                $update_sql = "UPDATE user_profiles SET marital_status =:marital_status, have_children =:have_children, family_values =:family_values, residency_status =:residency_status, father_name =:father_name, mother_name =:mother_name, brothers =:brothers, sisters =:sisters, married_brothers =:married_brothers, married_sisters =:married_sisters, about_family =:about_family WHERE id =:id";
                break;
                
            case "others":
                $update_sql = "UPDATE user_profiles SET nationality =:nationality, diet =:diet, smoke =:smoke, drink =:drink, hobbies =:hobbies, interests =:interests, fav_music =:fav_music, fav_reads =:fav_reads, fav_movies =:fav_movies, sports =:sports, cusine =:cusine, dress =:dress, spoken_languages =:spoken_languages WHERE id =:id";
                break;
                
            default:
                $update_sql = "";
                break;
        }
        
        
        
        
        $update_stmt = $this->conn->prepare($update_sql);
        
        
        
        
        switch($profileCategory){
            case "basic":
                $update_stmt->bindParam(':mobile', $i["mobile"], PDO::PARAM_STR);
                $update_stmt->bindParam(':religion', $i["religion"], PDO::PARAM_INT);
                $update_stmt->bindParam(':district', $i["district"], PDO::PARAM_INT);
                $update_stmt->bindParam(':state', $i["state"], PDO::PARAM_INT);
                $update_stmt->bindParam(':country', $i["country"], PDO::PARAM_STR);
                $update_stmt->bindParam(':id', $i["user_id"], PDO::PARAM_INT);
                break;
                
            case "astro":
                $update_stmt->bindParam(':birth_hour',$i["birth_hour"], PDO::PARAM_INT);
                $update_stmt->bindParam(':birth_minute',$i["birth_minute"],PDO::PARAM_INT);
                $update_stmt->bindParam(':birth_sec',$i["birth_sec"], PDO::PARAM_INT);
                $update_stmt->bindParam(':birth_city', $i["birth_city"], PDO::PARAM_STR);
                $update_stmt->bindParam(':rasi',$i["rasi"], PDO::PARAM_INT);
                $update_stmt->bindParam(':natchathram',$i["natchathram"], PDO::PARAM_INT);
                $update_stmt->bindParam(':id', $i["user_id"], PDO::PARAM_INT);
                break;
                
            case "contact":
                $update_stmt->bindParam(':alternate_phone', $i["alternate_phone"], PDO::PARAM_STR);
                $update_stmt->bindParam(':alternate_email', $i["alternate_email"], PDO::PARAM_STR);
                $update_stmt->bindParam(':whatsapp', $i["whatsapp"], PDO::PARAM_STR);
                $update_stmt->bindParam(':contact_person_name', $i["contact_person_name"], PDO::PARAM_STR);
                $update_stmt->bindParam(':contact_person_number', $i["contact_person_number"], PDO::PARAM_STR);
                $update_stmt->bindParam(':contact_person_relation', $i["contact_person_relation"], PDO::PARAM_STR);
                $update_stmt->bindParam(':convenient_call_time', $i["convenient_call_time"], PDO::PARAM_STR);
                $update_stmt->bindParam(':address', $i["address"], PDO::PARAM_STR);
                $update_stmt->bindParam(':id', $i["user_id"], PDO::PARAM_INT);
                break;
                
            case "family":
                $update_stmt->bindParam(':marital_status', $i["marital_status"], PDO::PARAM_STR);
                $update_stmt->bindParam(':have_children', $i["have_children"], PDO::PARAM_STR);
                $update_stmt->bindParam(':family_values', $i["family_values"], PDO::PARAM_STR);
                $update_stmt->bindParam(':residency_status', $i["residency_status"], PDO::PARAM_STR);
                $update_stmt->bindParam(':father_name', $i["father_name"], PDO::PARAM_STR);
                $update_stmt->bindParam(':mother_name', $i["mother_name"], PDO::PARAM_STR);
                $update_stmt->bindParam(':brothers', $i["brothers"], PDO::PARAM_INT);
                $update_stmt->bindParam(':sisters', $i["sisters"], PDO::PARAM_INT);
                $update_stmt->bindParam(':married_brothers', $i["married_brothers"], PDO::PARAM_INT);
                $update_stmt->bindParam(':married_sisters', $i["married_sisters"], PDO::PARAM_INT);
                $update_stmt->bindParam(':about_family', $i["about_family"], PDO::PARAM_STR);
                $update_stmt->bindParam(':id', $i["user_id"], PDO::PARAM_INT);
                break;
                
            case "others":
                $update_stmt->bindParam(':nationality', $i["nationality"], PDO::PARAM_STR);
                $update_stmt->bindParam(':diet', $i["diet"], PDO::PARAM_STR);
                $update_stmt->bindParam(':smoke', $i["smoke"], PDO::PARAM_STR);
                $update_stmt->bindParam(':drink', $i["drink"], PDO::PARAM_STR);
                $update_stmt->bindParam(':hobbies', $i["hobbies"], PDO::PARAM_STR);
                $update_stmt->bindParam(':interests', $i["interests"], PDO::PARAM_STR);
                $update_stmt->bindParam(':fav_music', $i["fav_music"], PDO::PARAM_STR);
                $update_stmt->bindParam(':fav_reads', $i["fav_reads"], PDO::PARAM_STR);
                $update_stmt->bindParam(':fav_movies', $i["fav_movies"], PDO::PARAM_STR);
                $update_stmt->bindParam(':sports', $i["sports"], PDO::PARAM_STR);
                $update_stmt->bindParam(':cusine', $i["cusine"], PDO::PARAM_STR);
                $update_stmt->bindParam(':dress', $i["dress"], PDO::PARAM_STR);
                $update_stmt->bindParam(':spoken_languages', $i["spoken_languages"], PDO::PARAM_STR);
                $update_stmt->bindParam(':id', $i["user_id"], PDO::PARAM_INT);
                break;
                
            default:
                break;
        }
        
            if ($update_stmt->execute() === false) {
                error_log("\n\n\n".print_r($update_stmt->error),3,"../log/profile-".profileCategory.".txt");
                return "Someing went wrong. Please try again later.";
            } else {
                return "Profile (".profileCategory.") updated successfully";
            }
        
    }
    
    public function cleanFileName($file_name){ 
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
        $file_name_str = pathinfo($file_name, PATHINFO_FILENAME); 

        // Replaces all spaces with hyphens. 
        $file_name_str = str_replace(' ', '-', $file_name_str); 
        // Removes special chars. 
        $file_name_str = preg_replace('/[^A-Za-z0-9\-\_]/', '', $file_name_str); 
        // Replaces multiple hyphens with single one. 
        $file_name_str = preg_replace('/-+/', '-', $file_name_str); 

        $clean_file_name = $file_name_str.'.'.$file_ext; 

        return $clean_file_name; 
    }
    
    public function uploadDocuments($field_name){
        $user_id = 1;
        $query = "SELECT id, login_id, email,created_date FROM " . $this->table_name . " WHERE id =:id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $created_date = $row['created_date'];
            $date = new DateTime($created_date);

            $year = $date->format('Y');
            $month = $date->format('F');
            
            
            
            $upload_dir = 'documents'.DIRECTORY_SEPARATOR;
            $year_folder = $upload_dir . $year;
            !file_exists("../".$year_folder) && mkdir("../".$year_folder , 0777);
	        $month_folder = $year_folder . DIRECTORY_SEPARATOR.$month;
            !file_exists("../".$month_folder) && mkdir("../".$month_folder, 0777);
            $user_folder = $month_folder .DIRECTORY_SEPARATOR.$user_id;
            !file_exists("../".$user_folder) && mkdir("../".$user_folder, 0777); 
            
            echo $user_folder;

    
            $file_name = $this->cleanFileName($_FILES[$field_name]['name']);
            $file_tmpname = $_FILES[$field_name]['tmp_name'];
            $file_size = $_FILES[$field_name]['size'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_ext = strtolower($file_ext);
            $newFileName = $user_id."-".$file_name;
            $filepath = $user_folder . DIRECTORY_SEPARATOR . $newFileName;

			$response = 0;
              ## Check file extension
              if(in_array(strtolower($file_ext), $this->valid_extensions)) {
                  
                  
                  if($file_size <= $this->maxsize && !file_exists($filepath)){
                      if(move_uploaded_file($file_tmpname,"../".$filepath)){
                          return true;
                      }
                         else{
                             return "File Upload Failed";
                         }
                       
                  }
                  
                  else if ($file_size > $this->maxsize){
                      return "Error: File size is larger than the allowed limit."; 
                  }	
                  
                  else if(file_exists($filepath)){
                      $filepath = $folderPath.DIRECTORY_SEPARATOR.time().$newFileName;
					
					if( move_uploaded_file($_FILES[$field_name]['tmp_name'][$i], "../".$filepath)) {
						return true;
                        
					} 
					else {					 
						return "104 : Error uploading {$file_name}"; 
                        
					}
                  }
				else {					 
						return "108 : Error uploading {$file_name}";
                        
				}
              }
             else {
				return "({$file_ext} file type is not allowed)";
                
			} 
         }
    }

    
}
?>
