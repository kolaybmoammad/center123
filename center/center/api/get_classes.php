<?php

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include_once("../connection/connect.php");
  
  
        if (mysqli_connect_errno()) {
            $response = array('status' => 'error', 'message' => 'Could not connect to the database: ' . mysqli_connect_error());
        } else { 
            $select_query = "select * from `classes` ";
            $result=mysqli_query($connexion, $select_query);
            if ($result) {

                $classes=array();
                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $class=array();
                      $class["id"]= $row["id"];
                      $class["code"]= $row["code"];
                      $class["cap"]= $row["capacity"];
                      array_push($classes,$class);
                }


                $response = array('status' => 'success', 'message' => 'Data inserted successfully.','classes'=> $classes);
            } else {
                $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($connexion));
            }

            mysqli_close($connexion);
        }
      
} else {
    $response = array('status' => 'error', 'message' => 'Only POST requests are allowed.');
}


// Convert the response array to JSON format and send it
header('Content-Type: application/json');
echo json_encode($response);
?>
