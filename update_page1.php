<?php
include('header.php');
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `courses` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);
    if ($result) $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_students'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $assignment_deadline = mysqli_real_escape_string($connection, $_POST['assignmentDeadline']);

    $query = "UPDATE `courses` SET `first_name` = '$fname', `last_name` = '$lname', `course` = '$course', `assignment_deadline` = '$assignment_deadline' WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header('Location: index.php?update_msg=Data updated successfully!');
    } else {
        die("Query Failed: " . mysqli_error($connection));
    }
}
?>

<form action="update_page1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" class="form-control" name="f_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" class="form-control" name="l_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="course">Course</label>
        <input type="text" class="form-control" name="course" value="<?php echo htmlspecialchars($row['course']); ?>" required>
    </div>
    <div class="form-group">
        <label for="assignmentDeadline">Assignment Deadline</label>
        <input type="number" class="form-control" name="assignmentDeadline" value="<?php echo htmlspecialchars($row['assignment_deadline']); ?>" required>
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>
