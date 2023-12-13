<?php
// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required data is provided in the POST request
    include_once("../connection/connect.php");
    
    if (isset($_POST['name'])) {
        // Get and sanitize the data from the POST request
        
        $name = sanitize($_POST['name']);
        $capacity= $_POST['capacity'];
        
        
        if (mysqli_connect_errno()) {
            $response = array('status' => 'error', 'message' => 'Could not connect to the database: ' . mysqli_connect_error());
        } else {
            // Prepare the insert query
            
            $insert_query = "INSERT INTO `classes` ( `code`,capacity) VALUES ('$name',$capacity)";
            
            // Perform the insert operation
            if (mysqli_query($connexion, $insert_query)) {
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
