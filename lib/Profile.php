<?php
class Profile {
    private $conn;
    
    
    private $tables = array("blood" => "master_blood_group","bodyType" => "master_body_types", "complex" => "master_complexions", "caste" => "master_caste", "subCaste" => "master_sub_caste","masritalStatus" => "master_marital_status", "natchathiram" => "master_natchathira", "rasi" => "master_rasi");
    
    public $masterData = [];

    public function __construct($db) {
        $this->conn = $db;
        session_start();
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
            $where .= " AND mn.id='".$filter["profile"]."'";
        } 
        
    }

    // Check if param is provided and is not empty

    // Construct the query
    $query = "SELECT mn.id, mn.login_id, mn.email, mn.mobile, mn.gender, mn.dob, mn.age, mn.religion as 'religion_id', rl.description as 'religion', mn.country as 'country_id',cn.description as 'country', mn.state as 'state_id', st.description as 'state', mn.district as 'district_id',  dt.description as 'district', prf.marital_status as 'marital_status_id', ms.description as 'marital_status', prf.have_children, prf.height, prf.weight, bt.description as 'body_type', prf.complextion as 'complextion_id', cx.description as 'complextion', prf.mother_tounge, prf.caste as 'caste_id', ct.description as 'caste', prf.sub_caste as 'sub_caste_id', sct.description as 'sub_caste', prf.family_values, prf.education, prf.qualification, prf.income, prf.diet, prf.smoke, prf.drink, prf.residency_status, prf.alternate_phone, prf.alternate_email, prf.whatsapp, prf.bio, prf.blood_group as 'blood_group_id', bg.description as 'blood_group', prf.gotra, prf.contact_person_name, prf.contact_person_number, prf.contact_person_relation, prf.convenient_call_time, prf.personal_values, prf.nationality, prf.father_name, prf.mother_name, prf.brothers, prf.sisters, prf.married_brothers, prf.married_sisters, prf.about_family, prf.birth_hour, prf.birth_minute, prf.birth_sec, prf.birth_city, prf.hobbies, prf.interests, prf.fav_music, prf.fav_reads, prf.fav_movies, prf.sports, prf.cusine, prf.dress, prf.spoken_languages, prf.rasi, prf.natchathram, prf.astro_profile, prf.address, prf.photo_1, prf.photo_2, prf.photo_3, prf.first_name,prf.last_name FROM users as mn INNER JOIN user_profiles as prf ON mn.id = prf.user_id INNER JOIN master_sub_relegion as rl ON mn.religion = rl.id INNER JOIN master_country as cn ON mn.country = cn.id INNER JOIN master_state as st ON mn.state = st.id INNER JOIN master_district as dt ON mn.district = dt.id INNER JOIN master_marital_status as ms ON prf.marital_status = ms.id INNER JOIN master_body_types as bt ON prf.body_type = bt.id INNER JOIN master_complexions as cx ON prf.complextion = cx.id INNER JOIN master_caste as ct ON prf.caste = ct.id INNER JOIN master_sub_caste as sct ON prf.sub_caste = sct.id INNER JOIN master_blood_group as bg ON prf.blood_group = bg.id ".$where;

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
