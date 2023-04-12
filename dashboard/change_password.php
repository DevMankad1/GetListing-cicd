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
        if (mysqli_num_rows($user)>0) 
        {
            include('user_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password'>
						<input type='password' placeholder='New Password' name='new_password'>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];


				$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE password = '$old_password' AND id = '{$_SESSION['id']}' ");
				if ($query == TRUE) 
				{
					echo "<script>alert('Your password is changed successfully')</script>";
					header('location:change_password.php');
				}
	   		}
        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	include('free_sidebar.php');
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password'>
						<input type='password' placeholder='New Password' name='new_password'>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];


				$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE password = '$old_password' AND id = '{$_SESSION['id']}' ");
				
				if ($query == TRUE) 
				{
					echo "<script>alert('Your password is changed successfully')</script>";
					header('location:change_password.php');
				}
	    	}
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password'>
						<input type='password' placeholder='New Password' name='new_password'>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];


				$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE password = '$old_password' AND id = '{$_SESSION['id']}' ");
				
				if ($query == TRUE) 
				{
					echo "<script>alert('Your password is changed successfully')</script>";
					header('location:change_password.php');
				}
	    	}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password'>
						<input type='password' placeholder='New Password' name='new_password'>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

	            if (isset($_POST['submit']))
			  	{
				    
				    $old_password = $_POST['old_password'];
				    $new_password = $_POST['new_password'];


				    $query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE password = '$old_password' AND id = '{$_SESSION['id']}' ");
					if ($query == TRUE) 
					{
						echo "<script>alert('Your password is changed successfully')</script>";
						header('location:change_password.php');
					}
	    		}
        }
        
?>