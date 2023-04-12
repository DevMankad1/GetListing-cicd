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
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_blog.php' class='a_right'>Add More</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Related To Your Listing</h2>
	            	<div class='add_more'>
						<a href='add_blog.php'>Blog</a>
					</div>
				</div>

            ";

        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_blog.php' class='a_right'>Add More</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Related To Your Listing</h2>
					<div class='add_more'>
						<a href='add_blog.php'>Blog</a>
						<a href='add_announcement.php'>Announcement</a>
						<a href='add_deals_offers.php'>Deals and Offers</a>
						<a href='add_faq.php'>FAQ</a>
					</div>
				</div>

            ";
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_blog.php' class='a_right'>Add More</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Related To Your Listing</h2>
					<div class='add_more'>
						<a href='add_blog.php'>Blog</a>
						<a href='add_announcement.php'>Announcement</a>
						<a href='add_deals_offers.php'>Deals and Offers</a>
						<a href='add_faq.php'>FAQ</a>
						<a href='add_product.php'>Product</a>
					</div>
				</div>

            ";
        }
        
?>