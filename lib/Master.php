<?php
class Master {
    private $conn;
    
    
    private $tables = array("blood" => "master_blood_group","bodyType" => "master_body_types", "complex" => "master_complexions", "caste" => "master_caste", "subCaste" => "master_sub_caste","masritalStatus" => "master_marital_status", "natchathiram" => "master_natchathira", "rasi" => "master_rasi","state" => "master_state", "district" => "master_district", "religion" => "master_sub_relegion");
    
    public $masterData = [];

    public function __construct($db) {
        $this->conn = $db;
        
    }

    public function MasterTable($table = "", $param = "") {
    // Validate table input
    if (!isset($this->tables[$table])) {
        throw new Exception("Invalid table name.");
    }

    // Initial where clause
    $where = "";
        
    

    // Check if param is provided and is not empty
    if ($param != "" && !empty($param) && ($table !== "subCaste" || $table !== "natchathiram")) {
        $where = " WHERE id = ?";
    }
        
    if($table == "subCaste"){
        $where = " WHERE caste = ?";
        if($param != "" && count($param) == 2){
            $where .= " AND id = ?";
        }
    }
        
    if($table == "natchathiram"){
        $where = " WHERE rasi = ?";
        if($param != "" && count($param) == 2){
            $where .= " AND id = ?";
        }
    }

    // Construct the query
    $query = "SELECT id, description FROM " . $this->tables[$table] . " " . $where;

    // Prepare the query
    $stmt = $this->conn->prepare($query);

    // Bind the parameter if provided
    if ($param != "" && !empty($param) && ($table !== "subCaste" || $table !== "natchathiram")) {
        // Assuming $param is an array and we want to bind the first element
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
    }
        
        if($table == "subCaste"){
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        if($param != "" && count($param) == 2){
            $stmt->bindParam(2, $param[1], PDO::PARAM_INT);
        }
    }
        
    if($table == "natchathiram"){
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        if($param != "" && count($param) == 2){
            $stmt->bindParam(2, $param[1], PDO::PARAM_INT);
        }
    }

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

    return false;
}

    
    
}
?>
