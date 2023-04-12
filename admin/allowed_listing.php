<?php include('../db.php'); session_start(); ?>

<?php  

	$update = mysqli_query($conn,"UPDATE listing SET status = '1' WHERE id = '{$_GET['id']}' ");
	header('location:allow_listing.php');
?>