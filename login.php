<?php
	
	$password = $_POST['psw'];
	$username = $_POST['uname'];
    
	// Database connection
	$conn = new mysqli('localhost','root','','hostel_management_system');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}else {
		$sql = "SELECT * FROM admin WHERE Username = '$username' and Password = '$password'";
	
		//For getting the results of the querys
		$result = mysqli_query($conn,$sql);
	
		if(!$row = mysqli_fetch_assoc($result))//checks if the result has selected any of the rows...
			{
				?>
				
				<script>
					
				alert("Your Username or password is incorrect");
				window.location.href = "login.html";
				</script>
				<?php
				$_SESSION["pass"] = "False";
				
			}
		else
			{
				$_SESSION['Login'] = "Active";
				
                header('location: home.php');
                //echo "Logged in as " $username;
			}
	}
?>