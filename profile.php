<?php
// profile.php
require("admin/admin_input_test.php");
require("admin/database.php");

// Set the response content type to JSON
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Read the incoming JSON request body
    $input = json_decode(file_get_contents('php://input'), true);

    // Check if 'name' and 'id' keys are present
    if (isset($input['name']) && isset($input['id'])) {
        // Check if 'name' and 'id' are not empty
        if (!empty($input['name']) && !empty($input['id'])) {
            $class = new input_test\test();
            $_POST['name']= $input['name'];
            $_POST['id']= $input['id'];
            $name = $class->text('name');
            $id = $class->number('id');

            // Validate the inputs
            if ($name != 'error' && $id != 'error') {
                // Example SQL query (replace with your table name and conditions)
                $sql = "SELECT * FROM volunteer WHERE id ='$id' AND name ='$name'";
                $result = $_SESSION['conn']->query($sql);
                $result= $result->fetchAll();
                // Prepare and execute your SQL query using $id and $name
                // Add database logic here...
                if(sizeof($result) > 0) echo json_encode(['success' =>['Valid inputs','result'=>$result[0]]]);
                else echo json_encode(['error' => 'Missing name or id in request']);
            } else {
                // Redirect if validation fails
                echo json_encode(['redirect' => 'http://192.168.0.105/rapid%20force/aboutvolunteer.php']);
            }
        } else {
            // Respond with an error for empty values
            echo json_encode(['error' => 'Name or ID cannot be empty']);
        }
    } else {
        // Respond with an error if keys are missing
        echo json_encode(['error' => 'Missing name or id in request']);
    }
} else {
    // Respond with an error for invalid request methods
    echo json_encode(['error' => 'Invalid request method']);
}
