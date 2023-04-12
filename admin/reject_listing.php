<?php include('../db.php'); session_start(); ?>

<?php  

	$delete = mysqli_query($conn,"DELETE FROM listing WHERE id = '{$_GET['id']}' ");
	header('location:allow_listing.php');

?>