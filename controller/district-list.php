<?php
$root = getenv("DOCUMENT_ROOT");
require_once("../lib/variables.php"); 
require_once BASE_PATH."/lib/db-connections.php";
require_once BASE_PATH."/lib/Master.php";

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the Master class
$master = new Master($db);

// Set the Content-Type header to application/json
header('Content-Type: application/json');

// Check if the state_id parameter is set in the URL
if (isset($_GET['state_id'])) {
    $state_id = intval($_GET['state_id']);
    $params = array($state_id);
    
    // Retrieve all district data for the given state_id
    $districtData = $master->MasterTable('district', $params);
    
    // Check if data is retrieved
    if (!empty($districtData)) {
        // Format the data
        $formattedData = array_map(function($district) {
            return [
                "id" => $district['id'],
                "description" => $district['description']
            ];
        }, $districtData);
        
        // Return data as JSON
        echo json_encode($formattedData);
    } else {
        // Return not found error if no data found
        http_response_code(404); // Not Found
        echo json_encode(["error" => "No districts found for the provided state_id"]);
    }
} else {
    // Return error message with a specific HTTP status code
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "state_id parameter is required"]);
}
?>
