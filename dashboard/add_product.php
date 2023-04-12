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
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_product.php' class='a_right'>Add Product</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Product</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Product Name</label>
						<input type='text' placeholder='Product Name' name='product_name'>
						<label>Product Description</label>
						<textarea name='product_description' rows='5' cols='6' placeholder='Product Description'></textarea><br>
						<label>Product Gallery</label>
						<input type='file' name='product_image'>
						<label>Product URL</label>
						<input type='text' placeholder='Product Website URL' name='product_url'>
						<input type='submit' value='Add Product' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$product_name = $_POST['product_name'];
				$product_description = $_POST['product_description'];
				$product_url = $_POST['product_url'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$product_date = date("Y/m/d");

				/*  Image upload 1*/
				$tmp_name1 = $_FILES['product_image']['tmp_name'];
				$product_img_path = "../product images/";
				$Filename1 = $_FILES['product_image']['name'];
				$Filename1 = rand(10, 1000).'-'.$Filename1;
				$new_filename1 = $product_img_path.$Filename1;


				if(move_uploaded_file($_FILES['product_image']['tmp_name'], $new_filename1))
				{
					$insert_query = mysqli_query($conn,"INSERT INTO product (listing_id,member_email,product_name,product_description,product_url,product_date,product_image) VALUES ('$listing_id','$member_email','$product_name','$product_description','$product_url','$product_date','$Filename1') ");
					header('location:product.php');
				}
	   		}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_product.php' class='a_right'>Add Product</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Product</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Product Name</label>
						<input type='text' placeholder='Product Name' name='product_name'>
						<label>Product Description</label>
						<textarea name='product_description' rows='5' cols='6' placeholder='Product Description'></textarea><br>
						<label>Product Gallery</label>
						<input type='file' name='product_image'>
						<label>Product URL</label>
						<input type='text' placeholder='Product Website URL' name='product_url'>
						<input type='submit' value='Add Product' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$product_name = $_POST['product_name'];
				$product_description = $_POST['product_description'];
				$product_url = $_POST['product_url'];
				$listing_id = $listing_fetch_row['0'];
				$member_email = $listing_fetch_row['3'];
				$product_date = date("Y/m/d");

				/*  Image upload 1*/
				$tmp_name1 = $_FILES['product_image']['tmp_name'];
				$product_img_path = "../product images/";
				$Filename1 = $_FILES['product_image']['name'];
				$Filename1 = rand(10, 1000).'-'.$Filename1;
				$new_filename1 = $product_img_path.$Filename1;


				if(move_uploaded_file($_FILES['product_image']['tmp_name'], $new_filename1))
				{
					$insert_query = mysqli_query($conn,"INSERT INTO product (listing_id,member_email,product_name,product_description,product_url,product_date,product_image) VALUES ('$listing_id','$member_email','$product_name','$product_description','$product_url','$product_date','$Filename1') ");
					header('location:product.php');
				}
	   		}
        }
        
?>