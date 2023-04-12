<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

?>
<h2 class="listing_feature_h2">Business Listing Gallery From <?php echo $listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_gallery">
				<label>Business Listing Gallery</label>
				<?php echo "<img src='listed images/".$listing_row['13']."' class='img1'>" ?>
				<?php echo "<img src='listed images/".$listing_row['14']."' class='img2'>" ?>
				<?php echo "<img src='listed images/".$listing_row['15']."' class='img3'>" ?>
			</div>
			<?php echo "<a href='listing_page.php?lid=".$listing_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
	</div>	
</div>

<?php include('footer.php'); ?>