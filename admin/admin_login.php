<?php include('../db.php'); session_start(); ?>
<link rel="stylesheet" href="../css/style.css" />

<!-- Login code -->
<?php  

	if (isset($_POST['submit'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
 
 		$query = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email' and password = '$password' and status != '0'");
 		
	   if($query == TRUE) 
	   {

			if (mysqli_num_rows($query)>0) 
			{	
	  		  	$row = mysqli_fetch_row($query);
	        	$_SESSION['admin_id'] = $row[0];
	  			header('location:home.php');
			}
			else
			{
	  			echo"<script>alert('Something is incorrect please try again')</script>";
			}
		}
}

?>
<form class="authen_form" method="POST">
	<h2>Log Into Get Listing</h2>
	<input type="email" placeholder="Email" name="email">
	<input type="password" placeholder="Password" name="password">
	<input type="submit" value="Login" name="submit">
</form>

<?php include('../footer.php'); ?>