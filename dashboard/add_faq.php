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
        	if (mysqli_num_rows($free)>0) 
	        {
	        	header('location:home.php');
	        }
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_faq.php' class='a_right'>Add FAQ'S</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Blog</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>FAQ Quesion</label>
						<input type='text' placeholder='FAQ Quesion' name='faq_quesion'>
						<label>FAQ Answer</label>
						<textarea name='faq_answer' rows='5' cols='6' placeholder='FAQ Answer'></textarea><br>
						<input type='submit' value='Add FAQ' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_sidebar_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$faq_quesion = $_POST['faq_quesion'];
				$faq_answer = $_POST['faq_answer'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$faq_date = date("Y/m/d");


				$insert_query = mysqli_query($conn,"INSERT INTO faq (listing_id,member_email,faq_question,listing_faq_answer,listing_faq_date) VALUES ('$listing_id','$member_email','$faq_quesion','$faq_answer','$faq_date') ");
					header('location:faq.php');
	   		}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_faq.php' class='a_right'>Add FAQ'S</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Blog</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>FAQ Quesion</label>
						<input type='text' placeholder='FAQ Quesion' name='faq_quesion'>
						<label>FAQ Answer</label>
						<textarea name='faq_answer' rows='5' cols='6' placeholder='FAQ Answer'></textarea><br>
						<input type='submit' value='Add FAQ' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$faq_quesion = $_POST['faq_quesion'];
				$faq_answer = $_POST['faq_answer'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$faq_date = date("Y/m/d");


				$insert_query = mysqli_query($conn,"INSERT INTO faq (listing_id,member_email,faq_question,listing_faq_answer,listing_faq_date) VALUES ('$listing_id','$member_email','$faq_quesion','$faq_answer','$faq_date') ");
					header('location:faq.php');
	   		}
        }
        
?>