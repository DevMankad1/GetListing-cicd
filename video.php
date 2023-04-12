<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

?>
<h2 class="listing_feature_h2">Business Listing Video From <?php echo $listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_video">
				<label>Business Listing Video</label>
				<label><?php echo $listing_row['16']; ?></label>
			</div>
			<?php echo "<a href='listing_page.php?lid=".$listing_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
	</div>	
</div>

<?php include('footer.php'); ?>