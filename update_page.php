<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result); // Fetching the row data here
    }
}
?>

<?php
if (isset($_POST['update_students'])) {

    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];

        // Fetching form data using $_POST instead of $_GET
        $fname = $_POST['f_name'];
        $lname = $_POST['L_name'];
        $age = $_POST['age'];

        $query = "UPDATE `students` SET `F_name` = '$fname', `l_name` = '$lname', `age` = '$age' WHERE `id` = '$idnew'";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?update_msg=You have successfully updated data.');
        }
    }
}
?>

<form action="update_page.php?id_new=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="f_name" class="mt-3">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo htmlspecialchars($row['F_name']); ?>">
    </div>
    <div class="form-group mt-3">
        <label for="L_name">Last Name</label>
        <input type="text" name="L_name" class="form-control" value="<?php echo htmlspecialchars($row['l_name']); ?>">
    </div>
    <div class="form-group mt-3">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo htmlspecialchars($row['age']); ?>">
    </div>
    <input type="submit" class="btn btn-success mt-3" name="update_students" value="UPDATE">
</form>

<?php include("footer.php"); ?>
