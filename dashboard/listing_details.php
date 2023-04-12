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
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' AND id = '{$_GET['id']}' ");
        	$listing_row = mysqli_fetch_row($listing);


        	// Open Operation Unserialize
        	$list_open_un = unserialize($listing_row['8']);
        	$list_open = '';

        	foreach ($list_open_un as  $value2) {
        		$list_open .= $value2.'<br>';
        	}

        	// Close Operation Unserialize
        	$list_close_un = unserialize($listing_row['9']);
        	$list_close = '';

        	foreach ($list_close_un as  $value3) {
        		$list_close .= $value3.'<br>';
        	}


        	include('free_sidebar.php');

            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="listing.php" class="a_right">Listing</a>/<a href="listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Listing Name</th>
	            			<td>'.$listing_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Location</th>
	            			<td>'.$listing_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Email</th>
	            			<td>'.$listing_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Owner</th>
	            			<td>'.$listing_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing City</th>
	            			<td>'.$listing_row['7'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Category</th>
	            			<td>'.$listing_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Tagline</th>
	            			<td>'.$listing_row['6'].'</td>
	            		</tr>
	            		<tr class="hour_operation">
	            			<th>Listing Hours Operation</th>
	            			<td class="open_hour"><label>Open : </label>'.$list_open.'</td>
	            			<td><label>Close : </label>'.$list_close.'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Description</th>
	            			<td>'.$listing_row['10'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Contact</th>
	            			<td>'.$listing_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Telephone</th>
	            			<td>'.$listing_row['12'].'</td>
	            		</tr>
	            		<tr class="listing_gallery">
	            			<th>Listing Gallery</th>
	            			<td><img src="../listed images/'.$listing_row['13'].'"></td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_row['18'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_row['21'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_row['22'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Bookmarks</th>
	            			<td>'.$listing_row['23'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Views</th>
	            			<td>'.$listing_row['24'].'</td>
	            		</tr>

	            	</table>
	            	<a href="edit_listing.php?id='.$listing_row['0'].'" class="edit_a">Edit Listing</a>
	          
	            </div>
			';
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' AND id = '{$_GET['id']}' ");
        	$listing_row = mysqli_fetch_row($listing);

        	// Open Operation Unserialize
        	$list_open_un = unserialize($listing_row['8']);
        	$list_open = '';

        	foreach ($list_open_un as  $value2) {
        		$list_open .= $value2.'<br>';
        	}

        	// Close Operation Unserialize
        	$list_close_un = unserialize($listing_row['9']);
        	$list_close = '';

        	foreach ($list_close_un as  $value3) {
        		$list_close .= $value3.'<br>';
        	}

			include('standard_sidebar.php');
        	
            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="listing.php" class="a_right">Listing</a>/<a href="listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Listing Name</th>
	            			<td>'.$listing_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Location</th>
	            			<td>'.$listing_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Email</th>
	            			<td>'.$listing_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Owner</th>
	            			<td>'.$listing_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing City</th>
	            			<td>'.$listing_row['7'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Category</th>
	            			<td>'.$listing_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Tagline</th>
	            			<td>'.$listing_row['6'].'</td>
	            		</tr>
	            		<tr class="hour_operation">
	            			<th>Listing Hours Operation</th>
	            			<td class="open_hour"><label>Open : </label>'.$list_open.'</td>
	            			<td><label>Close : </label>'.$list_close.'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Description</th>
	            			<td>'.$listing_row['10'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Contact</th>
	            			<td>'.$listing_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Telephone</th>
	            			<td>'.$listing_row['12'].'</td>
	            		</tr>
	            		<tr class="listing_gallery">
	            			<th>Listing Gallery</th>
	            			<td><img src="../listed images/'.$listing_row['13'].'"></td>
	            			<td><img src="../listed images/'.$listing_row['14'].'"></td>
	            		</tr>
	            		<tr>
	            			<th>Listing Website</th>
	            			<td>'.$listing_row['17'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Video</th>
	            			<td>'.$listing_row['16'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_row['18'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_row['21'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_row['22'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Bookmarks</th>
	            			<td>'.$listing_row['23'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Views</th>
	            			<td>'.$listing_row['24'].'</td>
	            		</tr>

	            	</table>
	            	<a href="edit_listing.php?id='.$listing_row['0'].'" class="edit_a">Edit Listing</a>
	          
	            </div>
			';
        }
        elseif (mysqli_num_rows($premium)>0)
        { 

        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' AND id = '{$_GET['id']}' ");
        	$listing_row = mysqli_fetch_row($listing);

        	// Open Operation Unserialize
        	$list_open_un = unserialize($listing_row['8']);
        	$list_open = '';

        	foreach ($list_open_un as  $value2) {
        		$list_open .= $value2.'<br>';
        	}

        	// Close Operation Unserialize
        	$list_close_un = unserialize($listing_row['9']);
        	$list_close = '';

        	foreach ($list_close_un as  $value3) {
        		$list_close .= $value3.'<br>';
        	}


        	include('premium_sidebar.php');

            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="listing.php" class="a_right">Listing</a>/<a href="listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Listing Name</th>
	            			<td>'.$listing_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Location</th>
	            			<td>'.$listing_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Email</th>
	            			<td>'.$listing_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Owner</th>
	            			<td>'.$listing_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing City</th>
	            			<td>'.$listing_row['7'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Category</th>
	            			<td>'.$listing_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Tagline</th>
	            			<td>'.$listing_row['6'].'</td>
	            		</tr>
	            		<tr class="hour_operation">
	            			<th>Listing Hours Operation</th>
	            			<td class="open_hour"><label>Open : </label>'.$list_open.'</td>
	            			<td><label>Close : </label>'.$list_close.'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Description</th>
	            			<td>'.$listing_row['10'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Contact</th>
	            			<td>'.$listing_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Telephone</th>
	            			<td>'.$listing_row['12'].'</td>
	            		</tr>
	            		<tr class="listing_gallery">
	            			<th>Listing Gallery</th>
	            			<td><img src="../listed images/'.$listing_row['13'].'"></td>
	            			<td><img src="../listed images/'.$listing_row['14'].'"></td>
	            			<td><img src="../listed images/'.$listing_row['15'].'"></td>
	            		</tr>
	            		<tr>
	            			<th>Listing Video</th>
	            			<td>'.$listing_row['16'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Website</th>
	            			<td>'.$listing_row['17'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_row['18'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Facebook</th>
	            			<td>'.$listing_row['19'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Instagram</th>
	            			<td>'.$listing_row['20'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_row['21'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_row['22'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Bookmarks</th>
	            			<td>'.$listing_row['23'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Views</th>
	            			<td>'.$listing_row['24'].'</td>
	            		</tr>

	            	</table>
	            	<a href="edit_listing.php?id='.$listing_row['0'].'" class="edit_a">Edit Listing</a>
	          
	            </div>
			';
        }
        
?>