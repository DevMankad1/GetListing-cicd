<!-- Header Include -->
<?php include('header.php'); ?>
<?php  

	include('db.php');
	if (!isset($_SESSION['id'])) 
	{
		header('location:login.php');
	}

?>
<?php  
	$user_select = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}' ");
	$user_select_fetch = mysqli_fetch_row($user_select);
	global $conn;
	$listing_id = $_GET['lid'];

	if (isset($_POST['submit'])) 
	{
		$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '$listing_id' ");
		$listing_fetch = mysqli_fetch_row($listing);

		$listing_id = $listing_fetch['0'];
		$member_email = $listing_fetch['3'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$review_date = date("Y/m/d");

		$insert = mysqli_query($conn,"INSERT INTO review (listing_id,member_email,user_name,user_email,user_message,review_date) VALUES ('$listing_id','$member_email','$name','$email','$message','$review_date')");

		if ($insert == TRUE) 
		{
			echo"<script>alert('Your Review Is Submitted')</script>";
		}
		else
		{
			echo"<script>alert('You Can Only submit one review')</script>";
		}

	}

?>
<form class="authen_form" method="POST">
	<h2>Write Review</h2>
	<?php echo "<input type='text' placeholder='Name' name='name' value='".$user_select_fetch['1']."' readonly>"; ?>
	<?php echo "<input type='text' placeholder='Email' name='email' value='".$user_select_fetch['2']."' readonly>"; ?>
	<textarea cols="5" rows="5" name="message" placeholder="Message"></textarea><br>
	<input type="submit" value="Give Review" name="submit">
</form>

<?php include('footer.php'); ?>