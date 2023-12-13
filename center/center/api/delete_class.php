<?php

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required data is provided in the POST request
    include_once("../connection/connect.php");
    
    if (isset($_POST['id'])) {
        // Get and sanitize the data from the POST request
        
        $id = $_POST['id'];

        if (mysqli_connect_errno()) {
            $response = array('status' => 'error', 'message' => 'Could not connect to the database: ' . mysqli_connect_error());
        } else {
            // Prepare the insert query
            
            $delete_query="delete from classes where id=".$id;
            
            // Perform the insert operation
            if (mysqli_query($connexion, $delete_query)) {
                $response = array('status' => 'success', 'message' => 'Data inserted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($connexion));
            }

            // Close the database connection
            mysqli_close($connexion);
        }
    } else {
        // Required data not provided in the POST request
        $response = array('status' => 'error', 'message' => 'Name must be provided in the POST request.');
    }
} else {
    // Invalid request method
    $response = array('status' => 'error', 'message' => 'Only POST requests are allowed.');
}


// Convert the response array to JSON format and send it
header('Content-Type: application/json');
echo json_encode($response);
?>
