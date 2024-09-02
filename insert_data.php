<?php
 include("header.php");
 include("dbcon.php"); 
if (isset($_POST['add_students'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['L_name'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('location:index.php?message= You need to fill in the first name.');
    } else {
        
        $query = "INSERT INTO `students` (`F_name`,`l_name`,`age`) values('$fname','$lname','$age')";
     
        $result = mysqli_query($connection, $query);
     
        if (!$result) {
            die("Query Failed".mysqli_error($connection));
        } else {
            header("location:index.php?insert_msg=your data has been added successfully.");
        }
    }
}
