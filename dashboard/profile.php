<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('../prevent_user.php'); ?>

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
        if (mysqli_num_rows($user)>0) 
        {
        	include('user_sidebar.php');

            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='profile.php' class='a_right'>Profile</a></label>
	            </div>
	            <div class='update_profile update'>
					<form method='POST'>
						<label>Name</label><input type='text' value='{$user_row['1']}' name='name'>
						<label>Email</label><input type='email' value='{$user_row['2']}' name='email'>
						<label>Contact</label><input type='text' value='{$user_row['3']}' name='contact'>
						<label>Password</label><input type='text' value='{$user_row['4']}' name='password'>
						<label>User Type</label><input type='text' value='{$user_row['6']}' name='type' readonly>
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

            	$query = mysqli_query($conn,"UPDATE user_type SET name='$name',email='$email',contact='$contact',password='$password' WHERE id='{$_SESSION['id']}' ");
            	
            	if ($query == TRUE) 
            	{
            		header('location:profile.php');
            	}
            }
        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	include('free_sidebar.php');

        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='profile.php' class='a_right'>Profile</a></label>
	            </div>
	            <div class='update_profile update'>
					<form method='POST'>
						<label>Name</label><input type='text' value='{$free_row['1']}' name='name'>
						<label>Email</label><input type='email' value='{$free_row['2']}' name='email'>
						<label>Contact</label><input type='text' value='{$free_row['3']}' name='contact'>
						<label>Password</label><input type='text' value='{$free_row['4']}' name='password'>
						<label>User Type</label><input type='text' value='{$free_row['6']}' name='type' readonly>
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

            	$query = mysqli_query($conn,"UPDATE user_type SET name='$name',email='$email',contact='$contact',password='$password' WHERE id='{$_SESSION['id']}' ");

            	if ($query == TRUE) 
            	{
            		header('location:profile.php');
            	}
            }
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');

        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='profile.php' class='a_right'>Profile</a></label>
	            </div>
	            <div class='update_profile update'>
					<form method='POST'>
						<label>Name</label><input type='text' value='{$standard_row['1']}' name='name'>
						<label>Email</label><input type='email' value='{$standard_row['2']}' name='email'>
						<label>Contact</label><input type='text' value='{$standard_row['3']}' name='contact'>
						<label>Password</label><input type='text' value='{$standard_row['4']}' name='password'>
						<label>User Type</label><input type='text' value='{$standard_row['6']}' name='type' readonly>
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

            	$query = mysqli_query($conn,"UPDATE user_type SET name='$name',email='$email',contact='$contact',password='$password' WHERE id='{$_SESSION['id']}' ");

            	if ($query == TRUE) 
            	{
            		header('location:profile.php');
            	}
            }
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');

            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='profile.php' class='a_right'>Profile</a></label>
	            </div>
	            <div class='update_profile update'>
					<form method='POST'>
						<label>Name</label><input type='text' value='{$premium_row['1']}' name='name'>
						<label>Email</label><input type='email' value='{$premium_row['2']}' name='email'>
						<label>Contact</label><input type='text' value='{$premium_row['3']}' name='contact'>
						<label>Password</label><input type='text' value='{$premium_row['4']}' name='password'>
						<label>User Type</label><input type='text' value='{$premium_row['6']}' name='type' readonly>
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

            	$query = mysqli_query($conn,"UPDATE user_type SET name='$name',email='$email',contact='$contact',password='$password' WHERE id='{$_SESSION['id']}' ");

            	if ($query == TRUE) 
            	{
            		header('location:profile.php');
            	}
            }
        }	
?>