<?php     //start php tag
//include connect.php page for database connection
include('connect.php');
Echo "There is some problem in inserting record1";
//if submit is not blanked i.e. it is clicked.
if(isset($_REQUEST['submit'])!='')
{
    Echo "There is some problem in inserting record2";
if($_REQUEST['student_id']=='' || $_REQUEST['First_name']=='' || $_REQUEST['Last_name']==''|| $_REQUEST['mobile_number']=='' || $_REQUEST['department_of_study']=='' || $_REQUEST['year_of_study']=='' || $_REQUEST['room_number']=='' )
{
Echo "please fill the empty field.";
}
Else
{
    Echo "There is some problem in inserting record3 ";
$sql="insert into student(student_id,first_name,last_name,mobile_number,department_of_study,year_of_study,room_number) values('".$_REQUEST['student_id']."', '".$_REQUEST['First_name']."', '".$_REQUEST['Last_name']."', '".$_REQUEST['mobile_number']."','".$_REQUEST['department_of_study']."','".$_REQUEST['year_of_study']."','".$_REQUEST['room_number']."')";
$res=mysql_query($sql);
if($res)
{
Echo "Record successfully inserted";
}
Else
{
Echo "There is some problem in inserting record";
}

}
}

?>