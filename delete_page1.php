<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `courses` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header('Location: index.php?delete_msg=Record deleted successfully!');
    } else {
        die("Query Failed: " . mysqli_error($connection));
    }
}
?>
