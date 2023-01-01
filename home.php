<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="homepage.css">
</head>
<?php
if(isset($_SESSION['Login'])){
?>
<div>
    <h3> Logged in as <?php echo $_SESSION['Login'];?></h3>
</div>
<?php
}
?>
<h1>Hostel Management System</h1>


<div class="tabs">
  <div class="tab-2">
    <label for="tab2-1">Students Info</label>
    <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
    <div>
    <div class="content">
    
    <div class="container">
      <h2 class="mb-5">Students</h2>

      <div class="table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>
              <th scope="col">
                <label class="control control--checkbox">
                  <div class="control__indicator"></div>
                </label>
              </th>
              <!-- <th scope="col">ID</th> -->
              <th scope="col" width = "15%">First Name</th>
              <th scope="col" width = "15%">Last Name</th>
              <th scope="col" width = "30%">Contact</th>
              <th scope="col" width = "30%">Department</th>
              <th scope="col" width = "15%">Year</th>
              <th scope="col" width = "15%">Room No</th>
            </tr>
          </thead>
          <tbody>
            
            <?php 
            $sql = "SELECT * FROM student;";
            $con = mysqli_connect('localhost', 'root', '','hostel_management_system');
            $result1 = $con->query($sql);
                if (mysqli_num_rows($result1)> 0){
                    while($row0 = mysqli_fetch_assoc($result1)){
                      ?>
                      <tr>
                        <td><?php echo $row0["Student_ID"] ?></td>
                        <td><?php echo $row0["First_Name"] ?></td>
                        <td><?php echo $row0["Last_name"] ?></td>
                        <td><?php echo $row0["Mobile_number"] ?></td>
                        <td><?php echo $row0["Department_of_study"] ?></td>
                        <td><?php echo $row0["Year_of_study"] ?></td>
                        <td><?php echo $row0["Room_number"] ?></td>
                    </tr>
                  <?php
                    }
                  
                }
            ?>
          </tbody>
        </table>
      </div>


    </div>

  </div>
        
    </div>
  </div>
  <div class="tab-2">
    <label for="tab2-2">Add Students</label>
    <input id="tab2-2" name="tabs-two" type="radio">
    <div>
    <form name="registration" method="post" action="contact.php">
  <div class="container">
    <hr>

    <label for="student_id"><b>Student ID</b></label>
    <input type="text" placeholder="Enter Student ID" name="student_id" id="student_id" required>

    <label for="first_name"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="first_name" id="first_name" required>

    <label for="last_name"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last_name" id="last_name" required>

    <label for="mobile_number"><b>Mobile Number</b></label> <br>
    <input type="number" placeholder="Enter Mobile Number" name="mobile_number" id="mobile_number" required>
    <br>
    <br>

    <label for="department_of_study"><b>Department Of Study</b></label>
    <input type="text" placeholder="Enter Department of Study" name="department_of_study" id="department_of_study" required>

    <label for="year_of_study"><b>Year Of Study</b></label>
    <input type="text" placeholder="Enter Year Of Study" name="year_of_study" id="year_of_study" required>

    <label for="room_number"><b>Room Number</b></label>
    <input type="text" placeholder="Enter Room Number" name="room_number" id="room_number" required>
    <hr>

    <input type="submit" name="submit" class="submit" id = "submit">Register user</input>
  </div>

</form>
    </div>
  </div>
</div>
</html>
