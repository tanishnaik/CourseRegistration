<?php
include('dbcon.php');

if (isset($_POST['add_students'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $assignment_deadline = mysqli_real_escape_string($connection, $_POST['assignmentDeadline']);

    $query = "INSERT INTO `courses` (`first_name`, `last_name`, `course`, `assignment_deadline`) VALUES ('$fname', '$lname', '$course', '$assignment_deadline')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?insert_msg=Data added successfully!');
    }
}
?>
