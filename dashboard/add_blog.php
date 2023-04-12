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
        	include('free_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_blog.php' class='a_right'>Add Blog</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Blog</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Blog Title</label>
						<input type='text' placeholder='Blog Title' name='blog_title'>
						<label>Blog Description</label>
						<textarea name='blog_description' rows='5' cols='6' placeholder='Blog Description'></textarea><br>
						<label>Blog Gallery</label>
						<input type='file' name='blog_image'>
						<input type='submit' value='Add Blog' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$blog_title = $_POST['blog_title'];
				$blog_description = $_POST['blog_description'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$blog_date = date("Y/m/d");

				/*  Image upload 1*/
				$tmp_name1 = $_FILES['blog_image']['tmp_name'];
				$blog_img_path = "../blog images/";
				$Filename1 = $_FILES['blog_image']['name'];
				$Filename1 = rand(10, 1000).'-'.$Filename1;
				$new_filename1 = $blog_img_path.$Filename1;

				if(move_uploaded_file($_FILES['blog_image']['tmp_name'], $new_filename1))
				{

					$insert_query = mysqli_query($conn,"INSERT INTO blog (listing_id,member_email,blog_title,blog_description,blog_date,blog_image) VALUES ('$listing_id','$member_email','$blog_title','$blog_description','$blog_date','$Filename1') ");
					header('location:blog.php');
				}
	   		}
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_blog.php' class='a_right'>Add Blog</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Blog</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Blog Title</label>
						<input type='text' placeholder='Blog Title' name='blog_title'>
						<label>Blog Description</label>
						<textarea name='blog_description' rows='5' cols='6' placeholder='Blog Description'></textarea><br>
						<label>Blog Gallery</label>
						<input type='file' name='blog_image'>
						<input type='submit' value='Add Blog' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$blog_title = $_POST['blog_title'];
				$blog_description = $_POST['blog_description'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$blog_date = date("Y/m/d");

				/*  Image upload 1*/
				$tmp_name1 = $_FILES['blog_image']['tmp_name'];
				$blog_img_path = "../blog images/";
				$Filename1 = $_FILES['blog_image']['name'];
				$Filename1 = rand(10, 1000).'-'.$Filename1;
				$new_filename1 = $blog_img_path.$Filename1;

				if(move_uploaded_file($_FILES['blog_image']['tmp_name'], $new_filename1))
				{

					$insert_query = mysqli_query($conn,"INSERT INTO blog (listing_id,member_email,blog_title,blog_description,blog_date,blog_image) VALUES ('$listing_id','$member_email','$blog_title','$blog_description','$blog_date','$Filename1') ");
					header('location:blog.php');
				}
	   		}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_blog.php' class='a_right'>Add Blog</a></label>
	            </div>
	            <div class='change_password blog_uploadmain'>
	            	<h2>Add Blog</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Blog Title</label>
						<input type='text' placeholder='Blog Title' name='blog_title'>
						<label>Blog Description</label>
						<textarea name='blog_description' rows='5' cols='6' placeholder='Blog Description'></textarea><br>
						<label>Blog Gallery</label>
						<input type='file' name='blog_image'>
						<input type='submit' value='Add Blog' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$blog_title = $_POST['blog_title'];
				$blog_description = $_POST['blog_description'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$blog_date = date("Y/m/d");

				/*  Image upload 1*/
				$tmp_name1 = $_FILES['blog_image']['tmp_name'];
				$blog_img_path = "../blog images/";
				$Filename1 = $_FILES['blog_image']['name'];
				$Filename1 = rand(10, 1000).'-'.$Filename1;
				$new_filename1 = $blog_img_path.$Filename1;

				if(move_uploaded_file($_FILES['blog_image']['tmp_name'], $new_filename1))
				{

					$insert_query = mysqli_query($conn,"INSERT INTO blog (listing_id,member_email,blog_title,blog_description,blog_date,blog_image) VALUES ('$listing_id','$member_email','$blog_title','$blog_description','$blog_date','$Filename1') ");
					header('location:blog.php');
				}
	   		}
        }
        
?>