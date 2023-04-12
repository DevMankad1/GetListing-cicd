<?php include('header.php'); ?>

<?php  

	$package_free = 'free';
	$package_standard = 'standard';
	$package_premium = 'premium';

?>
	<div class="plans">
			<label class="plans_title">Get Listing Pricing Plans</label>
			<div class="free">
				<label>Free</label>
				<hr>
				<label>&#x20b9; 0</label>
				<hr>
				<h4>&#10004; 30 Days Availability</h4>
				<h4>&#10004; One Listing</h4>
				<h4>&#10004; One Blogs</h4>
				<h4>&#10004; Limited Support</h4>
				<h4>&#10004; Few Images Galley</h4>
				<h4>&#10004; Edit Your Listing</h4>
				<hr>
				<?php echo '<a href="http://localhost/getlisting_final/add_listing.php?package='. $package_free .'">Get Started</a>'; ?>
			</div>
			<div class="premium">
				<label>Premium</label>
				<hr>
				<label>&#x20b9; 7999</label>
				<hr>
				<h5>&#10004; 1 Year Availability</h5>
				<h5>&#10004; One Listing</h5>
				<h5>&#10004; Five Blogs</h5>
				<h5>&#10004; Video</h5>
				<h5>&#10004; Announcement</h5>
				<h5>&#10004; Deals and offers</h5>
				<h5>&#10004; Appointment</h5>
				<h5>&#10004; See Visited Users</h5>
				<h5>&#10004; Sell Product</h5>
				<h5>&#10004; Search engine optimization</h5>
				<h5>&#10004; One to one consultation to get lead</h5>
				<hr>
				<?php echo '<a href="http://localhost/getlisting_final/add_listing.php?package='. $package_premium .'">Get Started</a>'; ?>
			</div> 
			<div class="standard">
				<label>Standard</label>
				<hr>
				<label>&#x20b9;3999</label>
				<hr>
				<h4>&#10004; 1 Year Availability</h4>
				<h4>&#10004; One Listing</h4>
				<h4>&#10004; Two Blogs</h4>
				<h4>&#10004; Video</h4>
				<h4>&#10004; Announcement</h4>
				<h4>&#10004; Deals and offers</h4>
				<h4>&#10004; Appointment</h4>
				<h4>&#10004; See Visited Users</h4>
				<hr>
				<?php echo '<a href="http://localhost/getlisting_final/add_listing.php?package='. $package_standard .'">Get Started</a>'; ?>
			</div>
			
	</div>

<?php include('footer.php'); ?>