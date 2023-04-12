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
        if (mysqli_num_rows($user)>0) 
        {
        	include('user_sidebar.php');

            echo "
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
											<h4>0 Favourites</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>PENDING LISTING</h3>
											<h4>0 Favourites</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>BLOG</h3>
											<h4>0 Favourites</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>PENDING BLOG</h3>
											<h4>0 Favourites</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>WEBSITE PAYMENT</h3>
											<h4>0 Favourites</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>WEBSITE VISITORS</h3>
											<h4>0 Favourites</h4>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	include('free_sidebar.php');

        	echo "
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
											<a href='pending_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>BLOG</h3>
											<h4>0</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>LISTING VISITOR</h3>
											<h4>0</h4>
											<a href='listing_visitor.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>BLOG VISITOR</h3>
											<h4>0</h4>
											<a href='blog_visitor.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>RATING</h3>
											<h4>0</h4>
											<a href='rating.php'>View</a>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');

        	echo "
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
											<a href='pending_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>BLOG</h3>
											<h4>0</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>VISITOR</h3>
											<h4>0</h4>
											<a href='listing_visitor.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>RATING</h3>
											<h4>0</h4>
											<a href='rating.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>APPOINTMENT</h3>
											<h4>0</h4>
											<a href='appointment.php'>View</a>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
        	
            echo "
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
											<a href='pending_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>BLOG</h3>
											<h4>0</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>VISITOR</h3>
											<h4>0</h4>
											<a href='listing_visitor.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>RATING</h3>
											<h4>0</h4>
											<a href='rating.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<h3>APPOINTMENT</h3>
											<h4>0</h4>
											<a href='appointment.php'>View</a>
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