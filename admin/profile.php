<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_admin.php'); ?>

<?php  

	$admin = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");

	$admin_row = mysqli_fetch_row($admin);

	if (mysqli_num_rows($admin)>0) 
        {
            echo "

            	<div class='sidebar'>
	            	<label><a href='home.php'>Home</a></label>
	            	<label><a href='profile.php'>Profile</a></label>
	            	<label><a href='add_package.php'>Add Package</a></label>
	            	<label><a href='edit_package.php'>Edit Package</a></label>
	            	<label><a href='allow_listing.php'>Allow Listing</a></label>
	            	<label><a href='allow_blog.php'>Allow Blog</a></label>
	            	<label><a href='change_password.php'>Change Password</a></label>
	            	<label><a href='logout.php'>Logout</a></label>
	            </div>
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='profile.php' class='a_right'>Profile</a></label>
	            </div>
	            <div class='update_profile update'>
					<form method='POST'>
						<label>Name</label><input type='text' value='{$admin_row['1']}' name='name'>
						<label>Email</label><input type='email' value='{$admin_row['2']}' name='email'>
						<label>Contact</label><input type='text' value='{$admin_row['3']}' name='contact'>
						<label>Password</label><input type='text' value='{$admin_row['4']}' name='password'>
						<label>User Type</label><input type='text' value='{$admin_row['5']}' name='type' readonly>
						<input type='submit' name='submit'>
					</form>
				</div>

            ";

            //update profile

            if (isset($_POST['submit'])) 
            {
            	$name = $_POST['name'];
            	$email = $_POST['email'];
            	$contact = $_POST['contact'];
            	$password = $_POST['password'];

            	$query = mysqli_query($conn,"UPDATE admin SET name='$name',email='$email',contact='$contact',password='$password' WHERE id='{$_SESSION['admin_id']}' ");
            	
            	if ($query == TRUE) 
            	{
            		header('location:profile.php');
            	}
            }
        }

?>