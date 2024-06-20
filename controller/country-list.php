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
$params = array();

// Retrieve all country data
$countryData = $master->MasterTable('country', $params);

// Check if data is retrieved
if (!empty($countryData)) {
    // Format the data
    $formattedData = array_map(function ($country) {
        return [
            "id" => $country['id'],
            "description" => $country['description']
        ];
    }, $countryData);

    // Return data as JSON
    echo json_encode($formattedData);
} else {
    // Return not found error if no data found
    http_response_code(404); // Not Found
    echo json_encode(["error" => "No countries found"]);
}
