// delete.php

<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'DELETE') {
    parse_str(file_get_contents("php://input"), $deleteData);
    if (!empty($deleteData['student_id'])) {
        $result = deleteStudent($deleteData['student_id']);
        echo json_encode($result);
    } else {
        echo json_encode(array('error' => 'No student ID provided'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}

?>
