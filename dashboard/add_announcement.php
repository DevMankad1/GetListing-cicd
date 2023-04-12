<!-- Header Include -->
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
        	header('location:home.php');
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_announcement.php' class='a_right'>Add Announcement</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Announcement</h2>
					<form class='authen_form' method='POST'>
						<input type='text' placeholder='Announcement Title' name='announcement_title'>
						<textarea name='announcement_description' rows='5' cols='6' placeholder='Announcement Description'></textarea><br>
						<input type='submit' value='Add Announcement' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$announcement_title = $_POST['announcement_title'];
				$announcement_description = $_POST['announcement_description'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$announcement_date = date("Y/m/d");


				$insert_query = mysqli_query($conn,"INSERT INTO announcement (listing_id,member_email,announcement_title,announcement_description,announcement_date) VALUES ('$listing_id','$member_email','$announcement_title','$announcement_description','$announcement_date') ");

				if ($insert_query == TRUE) 
				{
					echo "<script>alert('Your Announcement is Posted')</script>";
					header('location:announcement.php');
				}
	   		}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_announcement.php' class='a_right'>Add Announcement</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Announcement</h2>
					<form class='authen_form' method='POST'>
						<input type='text' placeholder='Announcement Title' name='announcement_title'>
						<textarea name='announcement_description' rows='5' cols='6' placeholder='Announcement Description'></textarea><br>
						<input type='submit' value='Add Announcement' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$announcement_title = $_POST['announcement_title'];
				$announcement_description = $_POST['announcement_description'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$announcement_date = date("Y/m/d");


				$insert_query = mysqli_query($conn,"INSERT INTO announcement (listing_id,member_email,announcement_title,announcement_description,announcement_date) VALUES ('$listing_id','$member_email','$announcement_title','$announcement_description','$announcement_date') ");

				if ($insert_query == TRUE) 
				{
					echo "<script>alert('Your Announcement is Posted')</script>";
					header('location:announcement.php');
				}
	   		}
        }
        
?>