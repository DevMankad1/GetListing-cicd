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
	            	<label><a href='home.php'>Home</a></label>
	            </div>
	            <div class='count_box'>
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
							</header>
							<div class='highlights'>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>LISTING</h3>
											<h4>0</h4>
											<a href='listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>PENDING LISTING</h3>
											<h4>0</h4>
											<a href='allow_listing.php'>Allow</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>PACKAGE</h3>
											<h4>0</h4>
											<a href='package.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>PENDING BLOG</h3>
											<h4>0</h4>
											<a href='allow_blog.php'>Allow</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>PAYMENT</h3>
											<h4>0</h4>
											<a href='payment.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>WEBSITE VISITOR</h3>
											<h4>0</h4>
											<a href='website_visitor.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>USERS</h3>
											<h4>0</h4>
											<a href='user.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>LISTING MEMBERS</h3>
											<h4>0</h4>
											<a href='listing_member.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>FEEDBACK</h3>
											<h4>0</h4>
											<a href='feedback.php'>View</a>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }

?>