<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_user.php'); ?>

<!-- User Roll Code For Dashboard-->
<?php 	
		$user = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='user'");
        $free = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='free'");
        $standard = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='standard'");
		$premium = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='premium'");
        
        // Fetching all the above data
        $user_row = mysqli_fetch_row($user);
        $free_row = mysqli_fetch_row($free);
        $standard_row = mysqli_fetch_row($standard);
        $premium_row = mysqli_fetch_row($premium);

        // Dashboard as per the priority
        if (mysqli_num_rows($free)>0) 
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}'");
        	$listing_row = mysqli_fetch_row($listing);

        	include('free_sidebar.php');

            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Location</th>
							<th>Email</th>
							<th>View</th>
							<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($listing)>0) 
						{
							echo '

								<tr>
									<td>1</td>
									<td>'.$listing_row['1'].'</td>
									<td>'.$listing_row['2'].'</td>
									<td>'.$listing_row['3'].'</td>
									<td>'.$listing_row['24'].'</td>
									<td><a href="http://localhost/getlisting_final/dashboard/listing_details.php?id='. $listing_row['0'] .'">View</a></td>
								</tr>

							';
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Location</th>
								<th>Email</th>
								<th>View</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}'");
        	$listing_row = mysqli_fetch_row($listing);

        	include('standard_sidebar.php');

            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Location</th>
							<th>Email</th>
							<th>View</th>
							<th>Action</th>
						</tr>
					";
						if (mysqli_num_rows($listing)>0) 
						{
							echo '

								<tr>
									<td>1</td>
									<td>'.$listing_row['1'].'</td>
									<td>'.$listing_row['2'].'</td>
									<td>'.$listing_row['3'].'</td>
									<td>'.$listing_row['24'].'</td>
									<td><a href="http://localhost/getlisting_final/dashboard/listing_details.php?id='. $listing_row['0'] .'">View</a></td>
								</tr>

							';
						}
						
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Location</th>
								<th>Email</th>
								<th>View</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($premium)>0)
        {

        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}'");
        	$listing_row = mysqli_fetch_row($listing);

        	include('premium_sidebar.php');

            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Location</th>
								<th>Email</th>
								<th>View</th>
								<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($listing)>0) 
						{
							echo '

								<tr>
									<td>1</td>
									<td>'.$listing_row['1'].'</td>
									<td>'.$listing_row['2'].'</td>
									<td>'.$listing_row['3'].'</td>
									<td>'.$listing_row['24'].'</td>
									<td><a href="http://localhost/getlisting_final/dashboard/listing_details.php?id='. $listing_row['0'] .'">View</a></td>
								</tr>

							';
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Location</th>
								<th>Email</th>
								<th>View</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";


        }
        
?>