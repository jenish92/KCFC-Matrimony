<?php
class Profile {
    private $conn;
    
    
    private $tables = array("blood" => "master_blood_group","bodyType" => "master_body_types", "complex" => "master_complexions", "caste" => "master_caste", "subCaste" => "master_sub_caste","masritalStatus" => "master_marital_status", "natchathiram" => "master_natchathira", "rasi" => "master_rasi");
    
    public $masterData = [];

    public function __construct($db) {
        $this->conn = $db;
        
    }

    public function ProfileLists($filter = "") {
   
    // Initial where clause
    $where = "WHERE mn.approval_status = 1 AND mn.available = 1 AND mn.active = 1";
        
    if($filter != ""){
        if(array_key_exists("age",$filter) && $filter["age"] != ""){
            $age_between = explode("-",$filter["age"]);
            $age_from = $age_between[0];
            $age_to = $age_between[1];
            $where .= " AND mn.age BETWEEN ".$age_from." AND ".$age_to;
        }
        
        if(array_key_exists("gender",$filter) && $filter["gender"] != ""){
            $where .= " AND mn.gender=".$filter["gender"];
        }
        
        if(array_key_exists("religion",$filter) && $filter["religion"] != ""){
            $where .= " AND mn.religion=".$filter["religion"];
        } 
        
        if(array_key_exists("profile",$filter) && $filter["profile"] != ""){
            $where .= " AND mn.login_id='".$filter["profile"]."'";
        } 
        
    }

    // Check if param is provided and is not empty

    // Construct the query
    $query = "SELECT mn.id, mn.login_id, mn.email, mn.mobile, mn.gender, mn.dob, mn.age, mn.religion, mn.country, mn.state, mn.district, prf.marital_status, prf.have_children, prf.height, prf.weight, prf.body_type, prf.complextion, prf.mother_tounge, prf.caste, prf.sub_caste, prf.family_values, prf.education, prf.qualification, prf.income, prf.diet, prf.smoke, prf.drink, prf.residency_status, prf.alternate_phone, prf.alternate_email, prf.whatsapp, prf.bio, prf.blood_group, prf.gotra, prf.contact_person_name, prf.contact_person_number, prf.contact_person_relation, prf.convenient_call_time, prf.personal_values, prf.nationality, prf.father_name, prf.mother_name, prf.brothers, prf.sisters, prf.married_brothers, prf.married_sisters, prf.about_family, prf.birth_hour, prf.birth_minute, prf.birth_sec, prf.birth_city, prf.hobbies, prf.interests, prf.fav_music, prf.fav_reads, prf.fav_movies, prf.sports, prf.cusine, prf.dress, prf.spoken_languages, prf.rasi, prf.natchathram, prf.astro_profile, prf.address, prf.photo_1, prf.photo_2, prf.photo_3, prf.first_name,prf.last_name FROM users as mn INNER JOIN user_profiles as prf ON mn.id = prf.user_id ".$where;

    // Prepare the query
    $stmt = $this->conn->prepare($query);

    // Execute the query
    $stmt->execute();

    // Fetch results and return
    $this->masterData = [];
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->masterData[] = $row;
        }
        return $this->masterData;
    }

    return $query;
}

    
    
}
?>
