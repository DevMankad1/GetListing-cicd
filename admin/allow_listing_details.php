<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_admin.php'); ?>

<?php  

	$admin = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");
	$admin_row = mysqli_fetch_row($admin);

	$listing_details = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['id']}'");
	$listing_details_row = mysqli_fetch_row($listing_details);

	if (mysqli_num_rows($admin)>0) 
        {
            echo '

            	<div class="sidebar">
	            	<label><a href="home.php">Home</a></label>
	            	<label><a href="profile.php">Profile</a></label>
	            	<label><a href="add_package.php">Add Package</a></label>
	            	<label><a href="edit_package.php">Edit Package</a></label>
	            	<label><a href="allow_listing.php">Allow Listing</a></label>
	            	<label><a href="allow_blog.php">Allow Blog</a></label>
	            	<label><a href="change_password.php">Change Password</a></label>
	            	<label><a href="logout.php">Logout</a></label>
	            </div>
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="allow_listing.php" class="a_right">Allow Listing</a>/<a href="allow_listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="allow_listing">
	            	<table>

	            		<tr>
	            			<th>Business Name</th>
	            			<td>'.$listing_details_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Business Location</th>
	            			<td>'.$listing_details_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Business Email</th>
	            			<td>'.$listing_details_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Business Owner</th>
	            			<td>'.$listing_details_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Business Contact</th>
	            			<td>'.$listing_details_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_details_row['17'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_details_row['20'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_details_row['21'].'</td>
	            		</tr>

	            	</table>
	            	<a href="http://localhost/getlisting_final/admin/allowed_listing.php?id='. $listing_details_row['0'] .'" class="allow">Allow Listing</a>
	            	<a href="http://localhost/getlisting_final/admin/reject_listing.php?id='. $listing_details_row['0'] .'" class="reject">Reject Listing</a>
	            </div>
			';

        }

?>