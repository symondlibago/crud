// function.php
<?php
require 'dbconn.php';


//create
function storeStudent($studentInput) {
    global $conn;

    $first_name = mysqli_real_escape_string($conn, $studentInput['first_name']);
    $last_name = mysqli_real_escape_string($conn, $studentInput['last_name']);
    $middle_initial = mysqli_real_escape_string($conn, $studentInput['middle_initial']);
    $gender = mysqli_real_escape_string($conn, $studentInput['gender']);

    $query = "INSERT INTO list (first_name, last_name, middle_initial, gender) 
              VALUES ('$first_name', '$last_name', '$middle_initial', '$gender')";

    if (mysqli_query($conn, $query)) {
        return array('message' => 'Student data stored successfully');
    } else {
    }
}

//read
function getStudentList(){
    global $conn;

    $query = "SELECT * FROM list";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if(mysqli_num_rows($query_run) > 0) {
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'message' => "customer list fetched successfully",
                'data' => $res
            ];
            return $data;
        }
    }
}

//update
function updateStudent($studentData) {
    global $conn;

    $student_id = mysqli_real_escape_string($conn, $studentData['student_id']);
    $first_name = mysqli_real_escape_string($conn, $studentData['first_name']);
    $last_name = mysqli_real_escape_string($conn, $studentData['last_name']);
    $middle_initial = mysqli_real_escape_string($conn, $studentData['middle_initial']);
    $gender = mysqli_real_escape_string($conn, $studentData['gender']);

    $query = "UPDATE list SET first_name = '$first_name', last_name = '$last_name', middle_initial = '$middle_initial', gender = '$gender' WHERE student_id = $student_id";

    if (mysqli_query($conn, $query)) {
        return array('message' => 'Student updated successfully');
    } else {
        return array('error' => 'Error updating student: ' . mysqli_error($conn));
    }
}


//delete
function deleteStudent($student_id) {
    global $conn;

    $query = "DELETE FROM list WHERE student_id = $student_id";

    if (mysqli_query($conn, $query)) {
        return array('message' => 'Student deleted successfully');
    } else {
        return array('error' => 'Error deleting student: ' . mysqli_error($conn));
    }
}



