<?php  
	
	include('prevent_user.php');

	$uid = $_SESSION['id'];
	$lid = $_GET['listing_id'];


	$user_fetch = mysqli_query($conn,"SELECT fav_listing FROM user_type WHERE id='{$lid}' ");
	$user_fetch_row = mysqli_fetch_row($listing_fetch);

	


	
?>