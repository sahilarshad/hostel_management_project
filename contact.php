<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','hostel_management_system');

// get the post records
$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_number = $_POST['mobile_number'];
$department_of_study = $_POST['department_of_study'];
$year_of_study = $_POST['year_of_study'];
$room_number = $_POST['room_number'];

// database insert SQL code
$sql = "INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `mobile_number`, `department_of_study`, `year_of_study` , `room_number`) VALUES ('$student_id', '$first_name', '$last_name', '$mobile_number', '$department_of_study', '$year_of_study', '$room_number')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
    header("location: home.php");
	//echo "Contact Records Inserted";
}

?>