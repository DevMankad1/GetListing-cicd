<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

	$announcement = mysqli_query($conn,"SELECT * FROM announcement WHERE listing_id = '{$_GET['listing_id']}' ");
	$announcement_row = mysqli_fetch_row($announcement);

?>
<h2 class="listing_feature_h2">Business Listing Announcement From <?php echo $listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_announcement">
				<label>Announcement Title :- </label>
				<label><?php echo $announcement_row['3']; ?></label>
				<label>Announcement Description :- </label>
				<label><?php echo $announcement_row['4']; ?></label>
				<label>Announcement Date :- </label>
				<label><?php echo $announcement_row['5']; ?></label>
			</div>
			<?php echo "<a href='listing_page.php?lid=".$listing_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
	</div>	
</div>

<?php include('footer.php'); ?>