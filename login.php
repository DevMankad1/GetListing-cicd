<!-- Header Include -->
<?php include('header.php'); ?>

<!-- Login code -->
<?php  

	if (isset($_POST['submit'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
 
 		$query = mysqli_query($conn,"SELECT * FROM user_type WHERE email = '$email' and password = '$password' and status != '0'");
 
   if($query) 
   {

		if (mysqli_num_rows($query)>0) 
		{	
  		  	$row = mysqli_fetch_row($query);
        	$_SESSION['id'] = $row[0];
  			header('location:dashboard/home.php');
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
	<a href="signup.php" class="aa_link">Didn't Join</a>|<a href="verification.php" class="ab_link">Not Verified</a>
</form>

<?php include('footer.php'); ?>