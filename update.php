// put.php

<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'PUT') {
    $putData = json_decode(file_get_contents("php://input"), true);
    if (!empty($putData['student_id'])) {
        $result = updateStudent($putData);
        echo json_encode($result);
    } else {
        echo json_encode(array('error' => 'No student ID provided'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}

?>
