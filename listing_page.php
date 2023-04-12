<?php include('header.php'); ?>
<?php  
	global $select_free_row;
	global $select_standard_row;
	global $select_premium_row;
	error_reporting(0);

	$lid = $_GET['lid'];

	$select_free = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' AND type='free' ");
	$select_free_row = mysqli_fetch_row($select_free);

	$select_standard = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' AND type='standard' ");
	$select_standard_row = mysqli_fetch_row($select_standard);

	$select_premium = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' AND type='premium' ");
	$select_premium_row = mysqli_fetch_row($select_premium);

?>
<?php  

	

?>
<?php  

	if (mysqli_num_rows($select_free)>0) 
	{
		$list_to_hour_un = unserialize($select_free_row['9']);

	    $mthr = $list_to_hour_un[0];
	    $tthr = $list_to_hour_un[1];
	    $wthr = $list_to_hour_un[2];
	    $ththr = $list_to_hour_un[3];
	    $fthr = $list_to_hour_un[4];
	    $sthr = $list_to_hour_un[5];
	    $suthr = $list_to_hour_un[6];

		$list_from_hour_un = unserialize($select_free_row['8']);

	    $mfhr = $list_from_hour_un[0];
	    $tfhr = $list_from_hour_un[1];
	    $wfhr = $list_from_hour_un[2];
	    $thfhr = $list_from_hour_un[3];
	    $ffhr = $list_from_hour_un[4];
	    $sfhr = $list_from_hour_un[5];
	    $sufhr = $list_from_hour_un[6];

		?>
		<div class="listing_page">
	<section id="banner">
				<div class="inner inner_listing">
					<div class="banner_left">
						<h2><?php echo $select_free_row['1']; ?></h2>
						<h3><?php echo $select_free_row['2']; ?></h3>
						<h3><?php echo $select_free_row['24']." Views"; ?></h3>
						<h3><?php echo $select_free_row['23']." Favourites"; ?></h3>
					</div>
					<div class="banner_right">
						<?php echo '<a href="add_to_favourite.php?listing_id='.$select_free_row['0'].'">Add To Favourite</a>'; ?>
						<?php echo '<a href="write_review.php?lid='.$select_free_row['0'].'">Write A Review</a>'; ?>
					</div>
				</div>
	</section>

	<section class="listingdtl">
		<div class="row">
			<div class="col-left">
				<div class="about_member_portion ldtlbx">
					<div class="about_portion">
						<label class="ttl">About The Listing</label>
						<div>
							<p><?php echo $select_free_row['10']; ?></p>
						</div>
					</div>
				</div>
				<div class="tagline_category_city ldtlbx">
					<div class="title">
						<label>Tagline</label>
						<label>Category</label>
						<label>City</label>
					</div>
					<br>
					<hr>
					<div class="value">
						<label><?php echo $select_free_row['6']; ?></label>
						<label><?php echo $select_free_row['5']; ?></label>
						<label><?php echo $select_free_row['7']; ?></label>
					</div>
				</div>
				<div class="explore_other ldtlbx">
					<label class="ttl">Explore More From <?php echo $select_free_row['1']; ?></label>
					<div>
						<?php echo '<a href="video.php?listing_id='.$select_free_row['0'].'">Video</a>'; ?>
						<?php echo '<a href="gallery.php?listing_id='.$select_premium_row['0'].'">Gallery</a>'; ?>
					</div>
				</div>
				<div class="review ldtlbx">
					<label class="ttl">People's Review About <?php echo $select_free_row['1']; ?></label>
					
					<div>
						<label>User Name</label>
						<label>Stars</label>
						<label>Review Description</label>
						<label>Review Date</label>
						<hr>
						<label>User Name</label>
						<label>Stars</label>
						<label>Review Description</label>
						<label>Review Date</label>
					</div>
				</div>
			</div>
			<div class="col-right">
				<div class="member_portion lsdbrbx">
					<label class="ttl">Member Profile</label>
					<div>
						<p><?php echo $select_free_row['4']; ?></p>
						<p><?php echo $select_free_row['3']; ?></p>
						<?php echo '<a href="contact_member.php?listing_id='.$select_free_row['0'].'">Contact</a>'; ?>
					</div>
				</div>
				<div class="hours_operation lsdbrbx">
					<label class="ttl">Hours Of Opeation</label>
					
					<div class="hours_sub">
						<div class="hrow"><label class="name">Monday</label><label class="value"><?php echo $mfhr." To ".$mthr; ?></label></div>
						<div class="hrow"><label class="name">Tuesday</label><label class="value"><?php echo $tfhr." To ".$tthr; ?></label></div>
						<div class="hrow"><label class="name">Wednesday</label><label class="value"><?php echo $wfhr." To ".$wthr; ?></label></div>
						<div class="hrow"><label class="name">Thursday</label><label class="value"><?php echo $thfhr." To ".$ththr; ?></label></div>
						<div class="hrow"><label class="name">Friday</label><label class="value"><?php echo $ffhr." To ".$fthr; ?></label></div>
						<div class="hrow"><label class="name">Saturday</label><label class="value"><?php echo $sfhr." To ".$sthr; ?></label></div>
						<div class="hrow"><label class="name">Sunday</label><label class="value"><?php echo $sufhr." To ".$suthr; ?></label></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<?php 
	
		}

		listing_view1();

		function listing_view1()
		{
			global $select_free_row;
			global $conn;

			$listing_view1 = $select_free_row['24'];
			if($listing_view1 >= 0) 
			{	
				$listing_view1_inc = $listing_view1+1;	
				$update = mysqli_query($conn,"UPDATE listing SET views='$listing_view1_inc' WHERE id = '{$select_free_row['0']}' ");
			}
		}

	?>

<?php  

	if (mysqli_num_rows($select_standard)>0) 
	{	

		$list_to_hour_un = unserialize($select_standard_row['9']);

	    $mthr = $list_to_hour_un[0];
	    $tthr = $list_to_hour_un[1];
	    $wthr = $list_to_hour_un[2];
	    $ththr = $list_to_hour_un[3];
	    $fthr = $list_to_hour_un[4];
	    $sthr = $list_to_hour_un[5];
	    $suthr = $list_to_hour_un[6];

		$list_from_hour_un = unserialize($select_standard_row['8']);

	    $mfhr = $list_from_hour_un[0];
	    $tfhr = $list_from_hour_un[1];
	    $wfhr = $list_from_hour_un[2];
	    $thfhr = $list_from_hour_un[3];
	    $ffhr = $list_from_hour_un[4];
	    $sfhr = $list_from_hour_un[5];
	    $sufhr = $list_from_hour_un[6];

		?>
		<div class="listing_page">
	<section id="banner">
				<div class="inner inner_listing">
					<div class="banner_left">
						<h2><?php echo $select_standard_row['1']; ?></h2>
						<h3><?php echo $select_standard_row['2']; ?></h3>
						<h3><?php echo $select_standard_row['24']." Views"; ?></h3>
						<h3><?php echo $select_standard_row['23']." Favourites"; ?></h3>
					</div>
					<div class="banner_right">
						<?php echo '<a href="add_to_favourite.php?listing_id='.$select_standard_row['0'].'">Add To Favourite</a>'; ?>
						<?php echo '<a href="write_review.php?lid='.$select_standard_row['0'].'">Write A Review</a>'; ?>
					</div>
				</div>
	</section>

	<section class="listingdtl">
		<div class="row">
			<div class="col-left">
				<div class="about_member_portion ldtlbx">
					<div class="about_portion">
						<label class="ttl">About The Listing</label>
						<div>
							<p><?php echo $select_standard_row['10']; ?></p>
						</div>
					</div>
				</div>
				<div class="tagline_category_city ldtlbx">
					<div class="title">
						<label>Tagline</label>
						<label>Category</label>
						<label>City</label>
					</div>
					<br>
					<hr>
					<div class="value">
						<label><?php echo $select_standard_row['6']; ?></label>
						<label><?php echo $select_standard_row['5']; ?></label>
						<label><?php echo $select_standard_row['7']; ?></label>
					</div>
				</div>
				<div class="explore_other ldtlbx">
					<label class="ttl">Explore More From <?php echo $select_standard_row['1']; ?></label>
					<div>
						<?php echo '<a href="video.php?listing_id='.$select_standard_row['0'].'">Video</a>'; ?>
						<?php echo '<a href="gallery.php?listing_id='.$select_premium_row['0'].'">Gallery</a>'; ?>
						<a href="#">Announcement</a>
						<a href="#">Deals & Offers</a>
						<a href="#">Get Appointment</a>
					</div>
				</div>
				<div class="review ldtlbx">
					<label class="ttl">People's Review About <?php echo $select_standard_row['1']; ?></label>
					
					<div>
						<label>User Name</label>
						<label>Stars</label>
						<label>Review Description</label>
						<label>Review Date</label>
						<hr>
						<label>User Name</label>
						<label>Stars</label>
						<label>Review Description</label>
						<label>Review Date</label>
					</div>
				</div>
			</div>
			<div class="col-right">
				<div class="member_portion lsdbrbx">
					<label class="ttl">Member Profile</label>
					<div>
						<p><?php echo $select_standard_row['4']; ?></p>
						<p><?php echo $select_standard_row['3']; ?></p>
						<?php echo '<a href="contact_member.php?listing_id='.$select_standard_row['0'].'">Contact</a>'; ?>
					</div>
				</div>
				<div class="social_media lsdbrbx">
					<label  class="ttl">Social Media About <?php echo $select_standard_row['1']; ?></label>
					
					<div>
						<label><?php echo $select_standard_row['1']."'s "; ?>Website</label><label class="value"><a href="#"><?php echo $select_standard_row['17']; ?></a></label>
					</div>
				</div>
				<div class="hours_operation lsdbrbx">
					<label class="ttl">Hours Of Opeation</label>
					
					<div class="hours_sub">
						<div class="hrow"><label class="name">Monday</label><label class="value"><?php echo $mfhr." To ".$mthr; ?></label></div>
						<div class="hrow"><label class="name">Tuesday</label><label class="value"><?php echo $tfhr." To ".$tthr; ?></label></div>
						<div class="hrow"><label class="name">Wednesday</label><label class="value"><?php echo $wfhr." To ".$wthr; ?></label></div>
						<div class="hrow"><label class="name">Thursday</label><label class="value"><?php echo $thfhr." To ".$ththr; ?></label></div>
						<div class="hrow"><label class="name">Friday</label><label class="value"><?php echo $ffhr." To ".$fthr; ?></label></div>
						<div class="hrow"><label class="name">Saturday</label><label class="value"><?php echo $sfhr." To ".$sthr; ?></label></div>
						<div class="hrow"><label class="name">Sunday</label><label class="value"><?php echo $sufhr." To ".$suthr; ?></label></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<?php 
	
		}

		listing_view2();

		function listing_view2()
		{
			global $select_standard_row;
			global $conn;

			$listing_view2 = $select_standard_row['24'];
			if($listing_view2 >= 0) 
			{	
				$listing_view2_inc = $listing_view2+1;
				$update = mysqli_query($conn,"UPDATE listing SET views='$listing_view2_inc' WHERE id = '{$select_standard_row['0']}' ");
			}
		}

	?> 


<?php  

	if (mysqli_num_rows($select_premium)>0) 
	{	

		$list_to_hour_un = unserialize($select_premium_row['9']);

	    $mthr = $list_to_hour_un[0];
	    $tthr = $list_to_hour_un[1];
	    $wthr = $list_to_hour_un[2];
	    $ththr = $list_to_hour_un[3];
	    $fthr = $list_to_hour_un[4];
	    $sthr = $list_to_hour_un[5];
	    $suthr = $list_to_hour_un[6];

		$list_from_hour_un = unserialize($select_premium_row['8']);

	    $mfhr = $list_from_hour_un[0];
	    $tfhr = $list_from_hour_un[1];
	    $wfhr = $list_from_hour_un[2];
	    $thfhr = $list_from_hour_un[3];
	    $ffhr = $list_from_hour_un[4];
	    $sfhr = $list_from_hour_un[5];
	    $sufhr = $list_from_hour_un[6];

		?>
		<div class="listing_page">
	<section id="banner">
				<div class="inner inner_listing">
					<div class="banner_left">
						<h2><?php echo $select_premium_row['1']; ?></h2>
						<h3><?php echo $select_premium_row['2']; ?></h3>
						<h3><?php echo $select_premium_row['24']." Views"; ?></h3>
						<h3><?php echo $select_premium_row['23']." Favourites"; ?></h3>
					</div>
					<div class="banner_right">
						<?php echo '<a href="add_to_favourite.php?listing_id='.$select_premium_row['0'].'">Add To Favourite</a>'; ?>
						<?php echo '<a href="write_review.php?lid='.$select_premium_row['0'].'">Write A Review</a>'; ?>
					</div>
				</div>
	</section>

	<section class="listingdtl">
		<div class="row">
			<div class="col-left">
				<div class="about_member_portion ldtlbx">
					<div class="about_portion">
						<label class="ttl">About The Listing</label>
						<div>
							<p><?php echo $select_premium_row['10']; ?></p>
						</div>
					</div>
				</div>
				<div class="tagline_category_city ldtlbx">
					<div class="title">
						<label>Tagline</label>
						<label>Category</label>
						<label>City</label>
					</div>
					<br>
					<hr>
					<div class="value">
						<label><?php echo $select_premium_row['6']; ?></label>
						<label><?php echo $select_premium_row['5']; ?></label>
						<label><?php echo $select_premium_row['7']; ?></label>
					</div>
				</div>
				<div class="explore_other ldtlbx">
					<label class="ttl">Explore More From <?php echo $select_premium_row['1']; ?></label>
					<div>
						<?php echo '<a href="video.php?listing_id='.$select_premium_row['0'].'">Video</a>'; ?>
						<?php echo '<a href="gallery.php?listing_id='.$select_premium_row['0'].'">Gallery</a>'; ?>
						<?php echo '<a href="announcement.php?listing_id='.$select_premium_row['0'].'">Announcement</a>'; ?>
						<a href="#">Deals & Offers</a>
						<a href="#">Get Appointment</a>
						<a href="#">Product</a>
					</div>
				</div>
				<div class="review ldtlbx">
					<label class="ttl">People's Review About <?php echo $select_premium_row['1']; ?></label>
					
					<div>
						<?php  

							$select_premium_review = mysqli_query($conn,"SELECT * FROM review WHERE listing_id = '{$select_premium_row['0']}' ");

							while ($select_premium_review_row = mysqli_fetch_row($select_premium_review)) 
							{
								echo "

										<label>".$select_premium_review_row['3']."</label>
										<label>Stars</label>
										<label>".$select_premium_review_row['5']."</label>
										<label>".$select_premium_review_row['7']."</label>
										<hr>

									";
							}

						?>
					</div>
				</div>
			</div>
			<div class="col-right">
				<div class="member_portion lsdbrbx">
					<label class="ttl">Member Profile</label>
					<div>
						<p><?php echo $select_premium_row['4']; ?></p>
						<p><?php echo $select_premium_row['3']; ?></p>
						<?php echo '<a href="contact_member.php?listing_id='.$select_premium_row['0'].'">Contact</a>'; ?>
					</div>
				</div>
				<div class="social_media lsdbrbx">
					<label  class="ttl">Social Media About <?php echo $select_premium_row['1']; ?></label>
					
					<div>
						<label><?php echo $select_premium_row['1']."'s "; ?>Website</label><label class="value"><a href="#"><?php echo $select_premium_row['17']; ?></a></label>
						<label><?php echo $select_premium_row['1']."'s "; ?>Facbook</label><label class="value"><a href="#"><?php echo $select_premium_row['19']; ?></a></label>
						<label><?php echo $select_premium_row['1']."'s "; ?>Instagram</label><label class="value"><a href="#"><?php echo $select_premium_row['20']; ?></a></label>
					</div>
				</div>
				<div class="hours_operation lsdbrbx">
					<label class="ttl">Hours Of Opeation</label>
					
					<div class="hours_sub">
						<div class="hrow"><label class="name">Monday</label><label class="value"><?php echo $mfhr." To ".$mthr; ?></label></div>
						<div class="hrow"><label class="name">Tuesday</label><label class="value"><?php echo $tfhr." To ".$tthr; ?></label></div>
						<div class="hrow"><label class="name">Wednesday</label><label class="value"><?php echo $wfhr." To ".$wthr; ?></label></div>
						<div class="hrow"><label class="name">Thursday</label><label class="value"><?php echo $thfhr." To ".$ththr; ?></label></div>
						<div class="hrow"><label class="name">Friday</label><label class="value"><?php echo $ffhr." To ".$fthr; ?></label></div>
						<div class="hrow"><label class="name">Saturday</label><label class="value"><?php echo $sfhr." To ".$sthr; ?></label></div>
						<div class="hrow"><label class="name">Sunday</label><label class="value"><?php echo $sufhr." To ".$suthr; ?></label></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<?php 
	
		}

		listing_view3();

		function listing_view3()
		{
			global $select_premium_row;
			global $conn;

			$listing_view3 = $select_premium_row['24'];
			if($listing_view3 >= 0) 
			{	
				$listing_view3_inc = $listing_view3+1;	
				$update = mysqli_query($conn,"UPDATE listing SET views='$listing_view3_inc' WHERE id = '{$select_premium_row['0']}' ");
			}
		}

	?>
	
<?php include('footer.php'); ?>