<html><?php
$con=mysqli_connect("localhost","root","","hotel");
if(isset($_POST['submit']))
{
	$check="select * from employee where PHONE=$_POST[phone]";
	$result = mysqli_query($con,$check);
	if(mysqli_num_rows($result) <1) {
			$current_date = date("Y-m-d H:i:s");
			$sql = "INSERT into employee (SALARY,FNAME,MINIT,LNAME,GENDER,PHONE,JOIN_DATE,DOB) VALUES ($_POST[SALARY],'$_POST[FNAME]','$_POST[MINIT]','$_POST[LNAME]','$_POST[GENDER]',$_POST[phone],'$current_date','$_POST[dob]')";
			$suc=mysqli_query($con,$sql);
			if($suc){
					 echo "<script type='text/javascript'>";
					 echo "alert('success!');";
					 echo "</script>";
					 }
			else{
									 echo "<script type='text/javascript'>";
					 echo "alert('employee exists!');";
					 echo "</script>";
			}
					 
					 
	}
	else{
					 echo "<script type='text/javascript'>";
					 echo "alert('employee exists!');";
					 echo "</script>";
		
		
	}
}
?>
</html>